<?php

namespace App\Http\Controllers\Api\Driver;

use App\Http\Controllers\Controller;
use App\Models\DriverDocument;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class DocumentController extends Controller
{
    protected FileUploadService $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function index(Request $request)
    {
        $driver = $request->user()->driver;

        if (!$driver) {
            return response()->json(['error' => 'Driver profile not found'], 404);
        }

        $documents = $driver->documents()->get()->map(function ($doc) {
            return [
                'id' => $doc->id,
                'type' => $doc->type,
                'name' => $this->getDocumentLabel($doc->type),
                'status' => $doc->status,
                'expiryDate' => $doc->expiry_date?->toIso8601String(),
                'url' => $this->fileUploadService->getUrl($doc->file_path),
                'uploadedAt' => $doc->created_at->toIso8601String(),
                'rejectionReason' => $doc->rejection_reason,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $documents,
        ]);
    }

    public function upload(Request $request)
    {
        try {
            Log::info('Document upload request', [
                'content_type' => $request->header('Content-Type'),
                'has_files' => $request->hasFile('document'),
                'all_files' => array_keys($request->allFiles()),
                'type' => $request->input('type'),
            ]);

            $validator = Validator::make($request->all(), [
                'type' => 'required|in:id_card_front,id_card_back,license_front,license_back,ruat,soat,insurance_certificate,profile_photo',
                'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
                'expiry_date' => 'nullable|date|after:today',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 422);
            }

            $driver = $request->user()->driver;

            if (!$driver) {
                return response()->json(['error' => 'Driver profile not found'], 404);
            }

            if (!$request->hasFile('document')) {
                return response()->json([
                    'success' => false,
                    'message' => 'No file was uploaded'
                ], 400);
            }

            $file = $request->file('document');
            
            if (!$file->isValid()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Uploaded file is not valid. Error: ' . $file->getError()
                ], 400);
            }

            try {
                $fileSize = $file->getSize();
                $originalName = $file->getClientOriginalName();
                $mimeType = $file->getMimeType();
            } catch (\Exception $e) {
                Log::error('Error reading file info: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Error reading uploaded file: ' . $e->getMessage()
                ], 500);
            }

            if ($fileSize === 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Uploaded file is empty'
                ], 400);
            }

            $folder = match($request->type) {
                'id_card_front' => 'documentos/carnet/frente',
                'id_card_back' => 'documentos/carnet/reverso',
                'license_front' => 'documentos/licencia/frente',
                'license_back' => 'documentos/licencia/reverso',
                'ruat' => 'documentos/ruat',
                'soat' => 'documentos/soat',
                'insurance_certificate' => 'documentos/seguro',
                'profile_photo' => 'fotos',
                default => 'documents',
            };

            $existing = $driver->documents()
                ->where('type', $request->type)
                ->first();

            if ($existing) {
                $path = $this->fileUploadService->update(
                    $file,
                    $existing->file_path,
                    "drivers/{$driver->id}/{$folder}"
                );

                $existing->update([
                    'file_path' => $path,
                    'original_name' => $originalName,
                    'file_size' => $fileSize,
                    'mime_type' => $mimeType,
                    'status' => 'pending',
                    'expiry_date' => $request->expiry_date,
                    'rejection_reason' => null,
                ]);

                $document = $existing;
            } else {
                $path = $this->fileUploadService->upload(
                    $file,
                    "drivers/{$driver->id}/{$folder}"
                );

                $document = DriverDocument::create([
                    'driver_id' => $driver->id,
                    'type' => $request->type,
                    'file_path' => $path,
                    'original_name' => $originalName,
                    'file_size' => $fileSize,
                    'mime_type' => $mimeType,
                    'status' => 'pending',
                    'expiry_date' => $request->expiry_date,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Documento subido correctamente',
                'data' => [
                    'id' => $document->id,
                    'type' => $document->type,
                    'status' => $document->status,
                    'url' => $this->fileUploadService->getUrl($document->file_path),
                ],
            ], 201);
            
        } catch (\Exception $e) {
            Log::error('Document upload error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error uploading document: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        $driver = $request->user()->driver;

        if (!$driver) {
            return response()->json(['error' => 'Driver profile not found'], 404);
        }

        $document = $driver->documents()->findOrFail($id);

        $this->fileUploadService->delete($document->file_path);
        $document->delete();

        return response()->json([
            'success' => true,
            'message' => 'Documento eliminado',
        ]);
    }

    private function getDocumentLabel($type): string
    {
        return match($type) {
            'id_card_front' => 'Carnet de Identidad (Anverso)',
            'id_card_back' => 'Carnet de Identidad (Reverso)',
            'license_front' => 'Licencia de Conducir (Anverso)',
            'license_back' => 'Licencia de Conducir (Reverso)',
            'ruat' => 'RUAT',
            'soat' => 'SOAT',
            'insurance_certificate' => 'Seguro Vehicular',
            'profile_photo' => 'Foto de Perfil',
            default => 'Documento',
        };
    }
}