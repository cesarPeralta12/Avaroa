<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required|string',
            'fcm_token' => 'nullable|string',
        ], [
            'email.required'    => 'El correo electrónico es obligatorio.',
            'email.email'       => 'La dirección de correo ingresada no es válida.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        if ($validator->fails()) {
            return $this->safeResponse([
                'success' => false,
                'message' => $validator->errors()->first() ?: 'Por favor, revisa los campos del formulario.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = User::where('email', $request->email)
                    ->where('account_type', 'driver')
                    ->first();

        if (!$user) {
            return $this->safeResponse([
                'success' => false,
                'message' => 'No pudimos iniciar sesión. Por favor, revisa tu correo y contraseña.',
            ], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            return $this->safeResponse([
                'success' => false,
                'message' => 'La contraseña ingresada es incorrecta.',
            ], 401);
        }

        $driver = Driver::where('user_id', $user->id)->first();

        if (!$driver) {
            return $this->safeResponse([
                'success' => false,
                'message' => 'Perfil de conductor no encontrado.',
            ], 404);
        }

        // Bloqueo 1: No verificado por admin
        if ($driver->approval_status !== 'approved' || !$driver->is_verified) {
            return $this->safeResponse([
                'success' => false,
                'code' => 'driver_not_verified',
                'message' => 'Tu cuenta esta en revision. Un administrador debe verificar tus documentos antes de que puedas comenzar. Te notificaremos cuando tu cuenta sea activada.',
                'approval_status' => $driver->approval_status,
                'is_verified' => (bool) $driver->is_verified,
            ], 403);
        }

        // Bloqueo 2: Cuenta suspendida
        if ($driver->approval_status === 'suspended' || $driver->status === 'suspended') {
            return $this->safeResponse([
                'success' => false,
                'code' => 'account_suspended',
                'message' => 'Tu cuenta ha sido suspendida. Por favor, contacta a soporte para mas informacion.',
            ], 403);
        }

        if ($request->fcm_token) {
            $user->update(['fcm_token' => $request->fcm_token]);
        }

        $user->update(['last_activity' => now()]);

        $abilities = ['driver:access'];
        if ($driver->status === 'available' || $driver->status === 'offline') {
            $abilities[] = 'driver:online';
        }

        $token = $user->createToken('driver_auth', $abilities)->plainTextToken;

        // Preparar datos del vehiculo (si existe)
        $vehicleData = null;
        if ($driver->vehicle) {
            $vehicleData = [
                'type'  => $this->cleanString($driver->vehicle->vehicle_type_label),
                'plate' => $this->cleanString($driver->vehicle->plate_number),
                'model' => $this->cleanString($driver->vehicle->model),
            ];
        }

        return $this->safeResponse([
            'success' => true,
            'message' => 'Inicio de sesion exitoso',
            'data' => [
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'name' => $this->cleanString($user->name),
                    'email' => $user->email,
                    'phone' => $this->cleanString($user->phone),
                    'role' => $user->role,
                    'profile_photo' => $user->profile_photo,
                ],
                'driver' => [
                    'id' => $driver->id,
                    'status' => $driver->status,
                    'approval_status' => $driver->approval_status,
                    'is_verified' => (bool) $driver->is_verified,
                    'is_online' => (bool) $driver->is_online,
                    'score' => $driver->score,
                    'rating' => $driver->score,
                    'license_number' => $this->cleanString($driver->license_number),
                    'vehicle' => $vehicleData,
                ],
            ],
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        if ($request->user()->driver) {
            $request->user()->driver->update([
                'is_online' => false,
                'status' => 'offline',
                'online_since' => null,
            ]);
        }

        return $this->safeResponse([
            'success' => true,
            'message' => 'Sesion cerrada correctamente',
        ]);
    }

    public function refreshToken(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        $driver = $user->driver;
        $abilities = ['driver:access'];
        if ($driver && in_array($driver->status, ['available', 'offline'])) {
            $abilities[] = 'driver:online';
        }

        $token = $user->createToken('driver_auth', $abilities)->plainTextToken;

        return $this->safeResponse([
            'success' => true,
            'token' => $token,
        ]);
    }

    /**
     * ============================================================
     * HELPERS SEGUROS CONTRA UTF-8 CORRUPTO
     * ============================================================
     */

    /**
     * Limpia un string: elimina bytes UTF-8 invalidos y caracteres de control
     */
    private function cleanString(?string $text): ?string
    {
        if ($text === null) {
            return null;
        }

        // 1. Forzar a UTF-8 valido (elimina bytes invalidos)
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');

        // 2. Reemplazar caracteres de control (excepto \n \r \t)
        $text = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $text);

        // 3. Normalizar comillas y acentos comunes corruptos
        $replacements = [
            "\xC3\xA2\xE2\x82\xAC\xC2\xA1" => '',   // basura com��n de Latin1��UTF-8
            "\xC3\x82" => '',
            "\xC2\xA0" => ' ',  // non-breaking space
        ];
        $text = strtr($text, $replacements);

        return trim($text);
    }

    /**
     * Limpia un array recursivamente aplicando cleanString a todos los valores
     */
    private function cleanArray(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $data[$key] = $this->cleanString($value);
            } elseif (is_array($value)) {
                $data[$key] = $this->cleanArray($value);
            } elseif ($value instanceof \Illuminate\Support\Collection) {
                $data[$key] = $this->cleanArray($value->toArray());
            } elseif (is_object($value) && method_exists($value, 'toArray')) {
                $data[$key] = $this->cleanArray($value->toArray());
            }
        }
        return $data;
    }

    /**
     * Devuelve Response JSON 100% seguro, sin pasar por response()->json()
     */
    private function safeResponse(array $data, int $status = 200): Response
    {
        // Limpiar TODO el array recursivamente
        $cleanData = $this->cleanArray($data);

        // Encode manual con flags de seguridad
        $json = json_encode($cleanData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);

        if ($json === false) {
            // Ultimo recurso: forzar con sustitucion de bytes invalidos
            $json = json_encode($cleanData, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
        }

        return new Response(
            $json,
            $status,
            [
                'Content-Type' => 'application/json; charset=utf-8',
                'X-Content-Type-Options' => 'nosniff',
            ]
        );
    }
}