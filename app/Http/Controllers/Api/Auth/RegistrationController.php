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
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'La dirección de correo ingresada no es válida.',
            'email.unique' => 'Este correo ya está registrado. Por favor, intenta con otro correo.',
            'phone.required' => 'El teléfono es requerido',
            'phone.min' => 'El teléfono debe tener al menos 8 dígitos',
            'phone.max' => 'El teléfono no debe exceder 20 dígitos',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first() ?: 'Por favor, revisa los campos del formulario.',
                'errors'  => $validator->errors(),
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
                'message' => 'Información personal guardada',
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
                'message' => 'Error al guardar la información',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function registerVehicleInfo(Request $request)
    {
        // Catálogo oficial AVAROA: moto, auto, minivan, camion, torito, bicicleta.
        // Aceptamos también las claves legacy y normalizamos antes de guardar.
        $allowedTypes = ['moto', 'auto', 'minivan', 'camion', 'torito', 'bicicleta'];
        $legacyAliases = ['motocicleta', 'automovil', 'camioneta', 'vagoneta', 'motorcycle', 'car', 'truck', 'bicycle'];

        $validator = Validator::make($request->all(), [
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_type' => ['required', Rule::in(array_merge($allowedTypes, $legacyAliases))],
            'license_plate' => 'required|string|max:20|unique:vehicles,plate_number',
            'vehicle_model' => 'required|string|max:255',
            'vehicle_year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'vehicle_color' => 'required|string|max:50',
        ], [
            'driver_id.required' => 'ID de conductor requerido',
            'driver_id.exists' => 'Conductor no encontrado',
            'vehicle_type.required' => 'El tipo de vehículo es requerido',
            'vehicle_type.in' => 'Tipo de vehículo no válido. Opciones: moto, auto, minivan, camion, torito, bicicleta',
            'license_plate.required' => 'La placa es requerida',
            'license_plate.unique' => 'Esta placa ya está registrada. Por favor, intenta con otra placa.',
            'license_plate.max' => 'La placa no debe exceder 20 caracteres',
            'vehicle_model.required' => 'El modelo es requerido',
            'vehicle_model.max' => 'El modelo no debe exceder 255 caracteres',
            'vehicle_year.required' => 'El año es requerido',
            'vehicle_year.integer' => 'El año debe ser un número entero',
            'vehicle_year.min' => 'El año debe ser 1990 o posterior',
            'vehicle_year.max' => 'El año no puede ser mayor a ' . (date('Y') + 1),
            'vehicle_color.required' => 'El color del vehículo es requerido',
            'vehicle_color.max' => 'El color no debe exceder 50 caracteres',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first() ?: 'Por favor, revisa los campos del formulario.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            DB::beginTransaction();

            $driver = Driver::findOrFail($request->driver_id);

            $canonicalType = Vehicle::canonicalType($request->vehicle_type);

            $vehicle = Vehicle::create([
                'driver_id' => $driver->id,
                'plate_number' => strtoupper($request->license_plate),
                'type' => $canonicalType,
                'model' => $request->vehicle_model,
                'year' => $request->vehicle_year,
                'color' => $request->vehicle_color,
                'capacity_weight' => $this->getDefaultCapacityWeight($canonicalType),
                'capacity_volume' => $this->getDefaultCapacityVolume($canonicalType),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Información del vehículo guardada',
                'data' => [
                    'vehicle_id' => $vehicle->id,
                    'next_step' => 'documents',
                ],
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar la información del vehículo',
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
                'message' => $validator->errors()->first() ?: 'Por favor, revisa los campos del formulario.',
                'errors'  => $validator->errors(),
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

            // Non-critical: link document IDs to vehicle (column may not exist yet)
            try {
                if ($driver->vehicle) {
                    $driver->vehicle->update(['documents' => $documentIds]);
                }
            } catch (\Throwable $e) {
                \Log::warning('Could not update vehicle.documents: ' . $e->getMessage());
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
                    'message' => 'Su documentación está siendo revisada. Le notificaremos en 24-48 horas.',
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

    protected function getDefaultCapacityWeight(string $vehicleType): float
    {
        return match (Vehicle::canonicalType($vehicleType)) {
            'moto'      => 50.00,
            'auto'      => 300.00,
            'minivan'   => 600.00,
            'camion'    => 3500.00,
            'torito'    => 80.00,
            'bicicleta' => 20.00,
            default     => 300.00,
        };
    }

    protected function getDefaultCapacityVolume(string $vehicleType): float
    {
        return match (Vehicle::canonicalType($vehicleType)) {
            'moto'      => 0.20,
            'auto'      => 2.00,
            'minivan'   => 4.00,
            'camion'    => 15.00,
            'torito'    => 0.50,
            'bicicleta' => 0.10,
            default     => 2.00,
        };
    }

    private function getStatusMessage($status)
    {
        $messages = [
            'pending' => 'Pendiente de completar registro',
            'under_review' => 'Documentos en revisión. Espere 24-48 horas.',
            'available' => 'Cuenta activa. Puede comenzar a recibir pedidos.',
            'busy' => 'Cuenta activa. Actualmente en entrega.',
            'offline' => 'Cuenta activa. Está desconectado.',
            'suspended' => 'Cuenta suspendida. Contacte soporte.',
        ];
        return $messages[$status] ?? 'Estado desconocido';
    }
}
