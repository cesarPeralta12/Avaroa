<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\DriverDocument;
use App\Models\Vehicle;
use App\Models\User;
use App\Services\MetaWhatsAppService;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    protected MetaWhatsAppService $metaWhatsApp;
    protected FileUploadService $fileUpload;

    public function __construct(MetaWhatsAppService $metaWhatsApp, FileUploadService $fileUpload)
    {
        $this->metaWhatsApp = $metaWhatsApp;
        $this->fileUpload = $fileUpload;
    }

    /**
     * List all drivers with filtering
     */
    public function index(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));

        $query = Driver::with(['user', 'vehicles', 'documents']);

        // Filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('is_verified')) {
            $query->where('is_verified', $request->boolean('is_verified'));
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('whatsapp_number', 'like', "%{$search}%");
            });
        }

        $drivers = $query->latest()->get();

        // Statistics
        $stats = [
            'total' => Driver::count(),
            'pending' => Driver::where('is_verified', false)->where('status', '!=', 'rejected')->count(),
            'verified' => Driver::where('is_verified', true)->count(),
            'online' => Driver::where('is_online', true)->count(),
        ];

        return view('admin.drivers.index', compact('drivers', 'user_session', 'stats'));
    }

    /**
     * List pending driver verifications
     */
    public function listPending(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));

        $query = Driver::with(['user', 'vehicles', 'documents'])
            ->where('is_verified', false)
            ->whereIn('status', ['pending', 'under_review']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $drivers = $query->latest()->get();

        return view('admin.drivers.pending', compact('drivers', 'user_session'));
    }

    /**
     * Show driver creation form
     */
    public function create()
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        $users = User::whereDoesntHave('driver')
            ->where('account_type', 'driver')
            ->get();

        return view('admin.drivers.create', compact('users', 'user_session'));
    }

    /**
     * Store new driver
     */
    public function store(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Please login first.'], 401);
        }

        $validated = $request->validate([
            'user_id'          => 'required|exists:users,id|unique:drivers,user_id',
            'license_number'   => 'required|string|max:20|unique:drivers,license_number',
            'status'           => 'required|in:available,busy,offline,pending,under_review',
            'is_online'        => 'boolean',
            'current_lat'      => 'nullable|numeric',
            'current_long'     => 'nullable|numeric',
            'score'            => 'nullable|numeric|between:0,5',
            'acceptance_rate'  => 'nullable|numeric|between:0,100',
        ]);

        Driver::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Driver created successfully.',
            'redirect' => route('admin.drivers.index')
        ]);
    }

    /**
     * Show driver details with all documents
     */
    public function show(Driver $driver)
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));

        $driver->load(['user', 'vehicles', 'documents' => function ($q) {
            $q->orderBy('created_at', 'desc');
        }]);

        // Document types for display
        $documentTypes = [
            'license_front' => 'Driver\'s License (Front)',
            'license_back' => 'Driver\'s License (Back)',
            'vehicle_registration' => 'Vehicle Registration',
            'insurance_certificate' => 'Insurance Certificate',
            'profile_photo' => 'Profile Photo',
        ];

        return view('admin.drivers.show', compact('driver', 'user_session', 'documentTypes'));
    }

    /**
     * Show driver edit form
     */
    public function edit(Driver $driver)
    {
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $user_session = User::findOrFail(Session::get('LoggedIn'));
        return view('admin.drivers.edit', compact('driver', 'user_session'));
    }

    /**
     * Update driver
     */
    public function update(Request $request, Driver $driver)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Please login first.'], 401);
        }

        $validated = $request->validate([
            'license_number'   => 'required|string|max:20|unique:drivers,license_number,' . $driver->id,
            'status'           => 'required|in:available,busy,offline,pending,under_review,rejected',
            'is_online'        => 'boolean',
            'is_verified'      => 'boolean',
            'current_lat'      => 'nullable|numeric',
            'current_long'     => 'nullable|numeric',
            'score'            => 'nullable|numeric|between:0,5',
            'penalties'        => 'nullable|integer|min:0',
            'acceptance_rate'  => 'nullable|numeric|between:0,100',
        ]);

        $driver->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Driver updated successfully.',
            'redirect' => route('admin.drivers.index')
        ]);
    }

    /**
     * Delete driver
     */
    public function destroy(Driver $driver)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        // Delete associated documents using FileUploadService
        foreach ($driver->documents as $document) {
            $this->fileUpload->delete($document->file_path);
            $document->delete();
        }

        // Delete associated vehicles
        foreach ($driver->vehicles as $vehicle) {
            $vehicle->delete();
        }

        $driver->delete();

        return response()->json(['success' => true, 'message' => 'Driver deleted']);
    }

    /**
     * Bulk delete drivers
     */
    public function bulkDelete(Request $request)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $ids = $request->ids ?? [];

        foreach ($ids as $id) {
            $driver = Driver::find($id);
            if ($driver) {
                // Delete documents using FileUploadService
                foreach ($driver->documents as $document) {
                    $this->fileUpload->delete($document->file_path);
                    $document->delete();
                }
                $driver->delete();
            }
        }

        return response()->json(['success' => true, 'message' => 'Selected drivers deleted']);
    }

   public function verifyDriver(Request $request, $id)
{
    if (!Session::has('LoggedIn')) {
        return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
    }

    try {
        DB::beginTransaction();

        $driver = Driver::with(['user', 'documents'])->findOrFail($id);

        // ✅ 1. Aprobar TODOS los documentos
        $driver->documents()->update([
            'status' => 'verified',
            'verified_at' => now(),
            'verified_by' => Session::get('LoggedIn'),
            'rejection_reason' => null,
        ]);

        // ✅ 2. Actualizar driver: aprobado y listo para operar
        $driver->update([
            'is_verified' => true,
            'approval_status' => 'approved',   // ← CORREGIDO: actualiza approval_status
            'status' => 'offline',             // ← Listo pero offline hasta que se conecte
            'verified_at' => now(),
            'verified_by' => Session::get('LoggedIn'),
        ]);

        // ✅ 3. Activar usuario
        $driver->user->update([
            'is_active' => true
        ]);

        // ✅ 4. Notificar conductor
        $this->notifyDriverApproved($driver);

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Conductor verificado correctamente. Ya puede iniciar sesión.',
        ]);

    } catch (\Exception $e) {
        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => 'Error de verificación: ' . $e->getMessage()
        ], 500);
    }
}

    /**
     * Reject driver verification
     */
    public function rejectDriver(Request $request, $id)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $request->validate([
            'reason' => 'required|string|max:500',
        ]);

        try {
            $driver = Driver::with('user')->findOrFail($id);

            $driver->update([
                'status' => 'rejected',
                'rejection_reason' => $request->reason,
                'is_verified' => false,
            ]);

            // Notify driver
            $this->notifyDriverRejected($driver, $request->reason);

            return response()->json([
                'success' => true,
                'message' => 'Driver application rejected',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Rejection failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Verify a specific document
     */
    public function verifyDocument(Request $request, $id)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $document = DriverDocument::with('driver.user')->findOrFail($id);

        $document->update([
            'status' => 'verified',
            'verified_at' => now(),
            'verified_by' => Session::get('LoggedIn'),
            'rejection_reason' => null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Document verified successfully',
            'document' => [
                'id' => $document->id,
                'type' => $document->type,
                'status' => 'verified'
            ]
        ]);
    }

    /**
     * Reject a document with reason
     */
    public function rejectDocument(Request $request, $id)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $request->validate([
            'reason' => 'required|string|max:500',
        ]);

        $document = DriverDocument::with('driver.user')->findOrFail($id);

        $document->update([
            'status' => 'rejected',
            'verified_at' => now(),
            'verified_by' => Session::get('LoggedIn'),
            'rejection_reason' => $request->reason,
        ]);

        // Notify driver about rejected document
        $this->notifyDocumentRejected($document, $request->reason);

        return response()->json([
            'success' => true,
            'message' => 'Document rejected',
            'document' => [
                'id' => $document->id,
                'type' => $document->type,
                'status' => 'rejected',
                'reason' => $request->reason
            ]
        ]);
    }

    /**
     * Preview document image
     */
    public function previewDocument($id)
    {
        if (!Session::has('LoggedIn')) {
            abort(401);
        }

        $document = DriverDocument::findOrFail($id);

        $filePath = $document->file_path;

        if (file_exists(public_path($filePath))) {
            return response()->file(public_path($filePath));
        }

        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->response($filePath);
        }

        abort(404);
    }

    /**
     * Download document
     */
    public function downloadDocument($id)
    {
        if (!Session::has('LoggedIn')) {
            abort(401);
        }

        $document = DriverDocument::findOrFail($id);
        $filePath = $document->file_path;

        if (file_exists(public_path($filePath))) {
            return response()->download(public_path($filePath), $document->original_name);
        }

        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath, $document->original_name);
        }

        abort(404);
    }

    /**
     * Upload driver document (admin side)
     */
    public function uploadDocument(Request $request, $driverId)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $request->validate([
            'type' => 'required|in:license_front,license_back,vehicle_registration,insurance_certificate,profile_photo',
            'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'expiry_date' => 'nullable|date|after:today',
        ]);

        $driver = Driver::findOrFail($driverId);

        try {
            $oldDoc = $driver->documents()->where('type', $request->type)->first();
            if ($oldDoc) {
                $this->fileUpload->delete($oldDoc->file_path);
                $oldDoc->delete();
            }

            $filePath = $this->fileUpload->upload(
                $request->file('document'),
                "drivers/{$driverId}/documents"
            );

            $document = DriverDocument::create([
                'driver_id' => $driver->id,
                'type' => $request->type,
                'file_path' => $filePath,
                'original_name' => $request->file('document')->getClientOriginalName(),
                'file_size' => $request->file('document')->getSize(),
                'mime_type' => $request->file('document')->getMimeType(),
                'status' => 'pending',
                'expiry_date' => $request->expiry_date,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Document uploaded successfully',
                'document' => [
                    'id' => $document->id,
                    'type' => $document->type,
                    'url' => $this->fileUpload->getUrl($filePath),
                    'status' => 'pending'
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete document
     */
    public function deleteDocument($id)
    {
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $document = DriverDocument::findOrFail($id);

        $this->fileUpload->delete($document->file_path);
        $document->delete();

        return response()->json([
            'success' => true,
            'message' => 'Document deleted successfully'
        ]);
    }

    /**
     * Notify driver of approval via WhatsApp
     */
    protected function notifyDriverApproved(Driver $driver): void
    {
        $phone = $driver->user->whatsapp_number ?? $driver->user->phone;

        if (empty($phone)) return;

        $message = "✅ *¡Cuenta Aprobada!*\n\n"
            . "Hola {$driver->user->name},\n\n"
            . "Tu cuenta de conductor ha sido verificada exitosamente. 🎉\n\n"
            . "Ya puedes iniciar sesión en la app y comenzar a recibir pedidos.\n\n"
            . "¡Bienvenido al equipo Delivery Avaroa! 🚚";

        $this->metaWhatsApp->sendMessage($phone, $message);
    }

    /**
     * Notify driver of rejection
     */
    protected function notifyDriverRejected(Driver $driver, string $reason): void
    {
        $phone = $driver->user->whatsapp_number ?? $driver->user->phone;

        if (empty($phone)) return;

        $message = "❌ *Solicitud Rechazada*\n\n"
            . "Hola {$driver->user->name},\n\n"
            . "Lamentamos informarte que tu solicitud ha sido rechazada.\n\n"
            . "*Motivo:* {$reason}\n\n"
            . "Puedes corregir la información y volver a aplicar cuando estés listo.";

        $this->metaWhatsApp->sendMessage($phone, $message);
    }

    /**
     * Notify driver of document rejection
     */
    protected function notifyDocumentRejected(DriverDocument $document, string $reason): void
    {
        $phone = $document->driver->user->whatsapp_number ?? $document->driver->user->phone;

        if (empty($phone)) return;

        $docNames = [
            'license_front' => 'licencia de conducir (frente)',
            'license_back' => 'licencia de conducir (reverso)',
            'vehicle_registration' => 'registro del vehículo',
            'insurance_certificate' => 'certificado de seguro',
            'profile_photo' => 'foto de perfil',
        ];

        $docName = $docNames[$document->type] ?? 'documento';

        $message = "⚠️ *Documento Rechazado*\n\n"
            . "Hola {$document->driver->user->name},\n\n"
            . "Tu {$docName} fue rechazado.\n\n"
            . "*Motivo:* {$reason}\n\n"
            . "Por favor sube nuevamente el documento corregido desde la app.";

        $this->metaWhatsApp->sendMessage($phone, $message);
    }
}
