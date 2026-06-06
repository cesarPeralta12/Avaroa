<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\DriverDocument;
use App\Models\User;
use App\Models\Vehicle;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function registerPersonalInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|min:8|max:20',
            'password' => 'required|string|min:8',
        ], [
            'full_name.required' => 'El nombre completo es requerido',
            'full_name.max' => 'El nombre no debe exceder 255 caracteres',
            'email.required' => 'El correo electr\u00f3nico es requerido',
            'email.email' => 'El correo electr\u00f3nico no es v\u00e1lido',
            'email.unique' => 'Este correo ya est\u00e1 registrado. Use otro correo.',
            'phone.required' => 'El tel\u00e9fono es requerido',
            'phone.min' => 'El tel\u00e9fono debe tener al menos 8 d\u00edgitos',
            'phone.max' => 'El tel\u00e9fono no debe exceder 20 d\u00edgitos',
            'password.required' => 'La contrase\u00f1a es requerida',
            'password.min' => 'La contrase\u00f1a debe tener al menos 8 caracteres',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validaci\u00f3n',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->full_name,
                'email' => $request->email,
                'whatsapp_number' => "591" . $request->phone,
                'password' => Hash::make($request->password),
                'role' => 'driver',
                'account_type' => 'driver',
                'is_active' => false,
            ]);

            $driver = Driver::create([
                'user_id' => $user->id,
                'status' => 'offline',
                'is_verified' => 0,
                'is_online' => false,
                'score' => 5.00,
                'acceptance_rate' => 100.00,
            ]);

            $token = $user->createToken('registration', ['driver:register'])->plainTextToken;

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Informaci\u00f3n personal guardada',
                'data' => [
                    'user_id' => $user->id,
                    'driver_id' => $driver->id,
                    'registration_token' => $token,
                    'next_step' => 'vehicle_info',
                ],
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar la informaci\u00f3n',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function registerVehicleInfo(Request $request)
    {
        // CRITICAL FIX: Updated vehicle types to include all 6 categories
        $validator = Validator::make($request->all(), [
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_type' => ['required', Rule::in([
                'moto',
                'automovil',
                'minivan',
                'camioneta',
                'torito',
                'bicicleta'
            ])],
            'license_plate' => 'required|string|max:20|unique:vehicles,plate_number',
            'vehicle_model' => 'required|string|max:255',
            'vehicle_year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'vehicle_color' => 'required|string|max:50',
        ], [
            'driver_id.required' => 'ID de conductor requerido',
            'driver_id.exists' => 'Conductor no encontrado',
            'vehicle_type.required' => 'El tipo de veh\u00edculo es requerido',
            'vehicle_type.in' => 'Tipo de veh\u00edculo no v\u00e1lido. Opciones: moto, automovil, minivan, camioneta, torito, bicicleta',
            'license_plate.required' => 'La placa es requerida',
            'license_plate.unique' => 'Esta placa ya est\u00e1 registrada. Use otra placa.',
            'license_plate.max' => 'La placa no debe exceder 20 caracteres',
            'vehicle_model.required' => 'El modelo es requerido',
            'vehicle_model.max' => 'El modelo no debe exceder 255 caracteres',
            'vehicle_year.required' => 'El a\u00f1o es requerido',
            'vehicle_year.integer' => 'El a\u00f1o debe ser un n\u00famero',
            'vehicle_year.min' => 'El a\u00f1o debe ser 1990 o posterior',
            'vehicle_year.max' => 'El a\u00f1o no puede ser mayor a ' . (date('Y') + 1),
            'vehicle_color.required' => 'El color del veh\u00edculo es requerido',
            'vehicle_color.max' => 'El color no debe exceder 50 caracteres',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validaci\u00f3n',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            DB::beginTransaction();

            $driver = Driver::findOrFail($request->driver_id);

            $vehicle = Vehicle::create([
                'driver_id' => $driver->id,
                'plate_number' => strtoupper($request->license_plate),
                'type' => $request->vehicle_type,
                'model' => $request->vehicle_model,
                'year' => $request->vehicle_year,
                'color' => $request->vehicle_color,
                'capacity_weight' => $this->getDefaultCapacityWeight($request->vehicle_type),
                'capacity_volume' => $this->getDefaultCapacityVolume($request->vehicle_type),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Informaci\u00f3n del veh\u00edculo guardada',
                'data' => [
                    'vehicle_id' => $vehicle->id,
                    'next_step' => 'documents',
                ],
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar la informaci\u00f3n del veh\u00edculo',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function uploadDocuments(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'driver_id' => 'required|exists:drivers,id',
            'id_card_front' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'id_card_back' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'drivers_license_front' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'drivers_license_back' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'ruat' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'soat' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'insurance_certificate' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ], [
            'driver_id.required' => 'ID de conductor requerido',
            'driver_id.exists' => 'Conductor no encontrado',
            'id_card_front.required' => 'Foto anverso de carnet requerida',
            'id_card_back.required' => 'Foto reverso de carnet requerida',
            'drivers_license_front.required' => 'Foto anverso de licencia requerida',
            'drivers_license_back.required' => 'Foto reverso de licencia requerida',
            'ruat.required' => 'RUAT requerido',
            'soat.required' => 'SOAT requerido',
            'insurance_certificate.required' => 'Seguro vehicular requerido',
            '*.mimes' => 'El archivo debe ser imagen (JPG, PNG) o PDF',
            '*.max' => 'El archivo no debe exceder 10MB',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validaci\u00f3n',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            DB::beginTransaction();

            $driver = Driver::with('user')->findOrFail($request->driver_id);
            $documentIds = [];

            $idFront = $this->uploadDocument($request->file('id_card_front'), $driver->id, 'id_card_front', 'documentos/carnet/frente');
            $documentIds[] = $idFront->id;

            $idBack = $this->uploadDocument($request->file('id_card_back'), $driver->id, 'id_card_back', 'documentos/carnet/reverso');
            $documentIds[] = $idBack->id;

            $licenseFront = $this->uploadDocument($request->file('drivers_license_front'), $driver->id, 'license_front', 'documentos/licencia/frente');
            $documentIds[] = $licenseFront->id;

            $licenseBack = $this->uploadDocument($request->file('drivers_license_back'), $driver->id, 'license_back', 'documentos/licencia/reverso');
            $documentIds[] = $licenseBack->id;

            $ruat = $this->uploadDocument($request->file('ruat'), $driver->id, 'ruat', 'documentos/ruat');
            $documentIds[] = $ruat->id;

            $soat = $this->uploadDocument($request->file('soat'), $driver->id, 'soat', 'documentos/soat');
            $documentIds[] = $soat->id;

            $insurance = $this->uploadDocument($request->file('insurance_certificate'), $driver->id, 'insurance_certificate', 'documentos/seguro');
            $documentIds[] = $insurance->id;

            if ($driver->vehicle) {
                $driver->vehicle->update(['documents' => $documentIds]);
            }

            $driver->update(['status' => 'offline', 'approval_status' => 'under_review']);

            $driver->user->tokens()->delete();
            $authToken = $driver->user->createToken('auth', ['driver:pending'])->plainTextToken;

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Solicitud enviada exitosamente',
                'data' => [
                    'driver_id' => $driver->id,
                    'status' => 'under_review',
                    'auth_token' => $authToken,
                    'message' => 'Su documentaci\u00f3n est\u00e1 siendo revisada. Le notificaremos en 24-48 horas.',
                ],
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al subir documentos',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function checkStatus($driverId)
    {
        $driver = Driver::with(['user', 'vehicles', 'documents'])->findOrFail($driverId);

        $documents = $driver->documents->map(function ($doc) {
            return [
                'id' => $doc->id,
                'type' => $doc->type,
                'status' => $doc->status,
                'url' => $doc->file_url,
                'expiry_date' => $doc->expiry_date,
            ];
        });

        // CORREGIDO: can_login depende de approval_status + is_verified, NO de status operativo
        $canLogin = $driver->approval_status === 'approved' && $driver->is_verified;

        return response()->json([
            'success' => true,
            'data' => [
                'driver_id' => $driver->id,
                'status' => $driver->status,
                'approval_status' => $driver->approval_status,
                'is_verified' => (bool) $driver->is_verified,
                'is_active' => (bool) $driver->user->is_active,
                'documents' => $documents,
                'can_login' => $canLogin,
                'message' => $this->getStatusMessage($driver->approval_status, $driver->is_verified),
            ],
        ]);
    }

    private function uploadDocument($file, $driverId, $type, $folder)
    {
        $originalName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();

        $existing = DriverDocument::where('driver_id', $driverId)
            ->where('type', $type)
            ->first();

        if ($existing) {
            $path = $this->fileUploadService->update(
                $file,
                $existing->file_path,
                "drivers/{$driverId}/{$folder}"
            );

            $existing->update([
                'file_path' => $path,
                'original_name' => $originalName,
                'file_size' => $fileSize,
                'mime_type' => $mimeType,
                'status' => 'pending',
            ]);

            return $existing;
        }

        $path = $this->fileUploadService->upload(
            $file,
            "drivers/{$driverId}/{$folder}"
        );

        return DriverDocument::create([
            'driver_id' => $driverId,
            'type' => $type,
            'file_path' => $path,
            'original_name' => $originalName,
            'file_size' => $fileSize,
            'mime_type' => $mimeType,
            'status' => 'pending',
        ]);
    }

    // CRITICAL FIX: Updated capacity weights for all 6 vehicle types
    protected function getDefaultCapacityWeight(string $vehicleType): float
    {
        return match ($vehicleType) {
            'moto' => 50.00,
            'automovil' => 300.00,
            'minivan' => 600.00,
            'camioneta' => 1500.00,
            'torito' => 80.00,
            'bicicleta' => 20.00,
            'moto_restaurant', 'moto_veloz', 'moto_socorro', 'moto_taxi' => 50.00,
            'movil', 'movil_vagoneta', 'movil_ipsum', 'movil_parrilla' => 300.00,
            default => 300.00,
        };
    }

    // CRITICAL FIX: Updated capacity volumes for all 6 vehicle types
    protected function getDefaultCapacityVolume(string $vehicleType): float
    {
        return match ($vehicleType) {
            'moto' => 0.20,
            'automovil' => 2.00,
            'minivan' => 4.00,
            'camioneta' => 10.00,
            'torito' => 0.50,
            'bicicleta' => 0.10,
            'moto_restaurant', 'moto_veloz', 'moto_socorro', 'moto_taxi' => 0.20,
            'movil', 'movil_vagoneta', 'movil_ipsum', 'movil_parrilla' => 2.00,
            default => 2.00,
        };
    }

    private function getStatusMessage($status)
    {
        $messages = [
            'pending' => 'Pendiente de completar registro',
            'under_review' => 'Documentos en revisi\u00f3n. Espere 24-48 horas.',
            'available' => 'Cuenta activa. Puede comenzar a recibir pedidos.',
            'busy' => 'Cuenta activa. Actualmente en entrega.',
            'offline' => 'Cuenta activa. Est\u00e1 desconectado.',
            'suspended' => 'Cuenta suspendida. Contacte soporte.',
        ];
        return $messages[$status] ?? 'Estado desconocido';
    }
}
