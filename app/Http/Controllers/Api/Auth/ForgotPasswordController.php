<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetOtp;
use App\Models\User;
use App\Services\MetaWhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    protected MetaWhatsAppService $metaWhatsApp;

    public function __construct(MetaWhatsAppService $metaWhatsApp)
    {
        $this->metaWhatsApp = $metaWhatsApp;
    }

    /**
     * Step 1: Send OTP via WhatsApp to the given phone number
     */
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|exists:users,whatsapp_number',
        ], [
            'phone.required' => 'El número de teléfono es requerido',
            'phone.exists'   => 'Este número no está registrado',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            $otp   = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $token = Str::random(64);

            // Invalidate previous OTPs for this phone
            PasswordResetOtp::where('email', $request->phone)
                ->where('is_used', false)
                ->update(['is_used' => true]);

            PasswordResetOtp::create([
                'email'      => $request->phone, // reusing email column as identifier
                'otp'        => $otp,
                'token'      => $token,
                'expires_at' => now()->addMinutes(10),
            ]);

            $user = User::where('whatsapp_number', $request->phone)->first();

            $sent = $this->sendOtpViaWhatsApp($user, $otp);

            if (!$sent) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se pudo enviar el código por WhatsApp. Intente nuevamente.',
                ], 500);
            }

            Log::info('OTP sent via WhatsApp', ['user_id' => $user->id, 'phone' => $request->phone]);

            return response()->json([
                'success' => true,
                'message' => 'Código enviado por WhatsApp',
                'data'    => [
                    'phone'      => $request->phone,
                    'masked'     => $this->maskPhone($request->phone),
                    'expires_in' => 600,
                    'countdown'  => 60,
                    'channels'   => ['whatsapp'],
                ],
            ]);

        } catch (\Exception $e) {
            Log::error('OTP generation failed', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Error al generar el código',
            ], 500);
        }
    }

    /**
     * Send OTP via WhatsApp — template first, free-form as fallback
     */
    protected function sendOtpViaWhatsApp(User $user, string $otp): bool
    {
        $phone = $user->whatsapp_number;

        try {
            $sent = $this->metaWhatsApp->sendTemplateMessage(
                $phone,
                'otp_verification_sp',
                [$user->name ?? 'Usuario', $otp, '10 minutos']
            );

            if ($sent) return true;
        } catch (\Exception $e) {
            Log::error('WhatsApp template failed', ['error' => $e->getMessage()]);
        }

        // Free-form fallback (works inside 24h window)
        try {
            $message = "🔐 *Recuperación de Contraseña*\n\n"
                     . "Hola {$user->name},\n\n"
                     . "Tu código es: *{$otp}*\n"
                     . "⏱️ Válido por 10 minutos.\n\n"
                     . "Si no solicitaste esto, ignora este mensaje.";

            return $this->metaWhatsApp->sendMessage($phone, $message);
        } catch (\Exception $e) {
            Log::error('WhatsApp free-form failed', ['error' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Step 2: Verify OTP
     */
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|exists:users,whatsapp_number',
            'otp'   => 'required|string|size:6',
        ], [
            'phone.required' => 'El número de teléfono es requerido',
            'phone.exists'   => 'Este número no está registrado',
            'otp.required'   => 'El código es requerido',
            'otp.size'       => 'El código debe tener 6 dígitos',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors'  => $validator->errors(),
            ], 422);
        }

        $resetOtp = PasswordResetOtp::where('email', $request->phone)
            ->where('otp', $request->otp)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$resetOtp) {
            return response()->json([
                'success' => false,
                'message' => 'Código inválido o expirado',
                'error'   => 'invalid_otp',
            ], 400);
        }

        $resetOtp->update(['expires_at' => now()->addMinutes(15)]);

        return response()->json([
            'success' => true,
            'message' => 'Código verificado correctamente',
            'data'    => [
                'reset_token' => $resetOtp->token,
                'phone'       => $request->phone,
                'next_step'   => 'new_password',
            ],
        ]);
    }

    /**
     * Step 3: Reset Password
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone'                 => 'required|string|exists:users,whatsapp_number',
            'reset_token'           => 'required|string',
            'password'              => 'required|string|min:6',
            'password_confirmation' => 'required|string|same:password',
        ], [
            'phone.required'                 => 'El número de teléfono es requerido',
            'phone.exists'                   => 'Este número no está registrado',
            'reset_token.required'           => 'Token de reset requerido',
            'password.required'              => 'La contraseña es requerida',
            'password.min'                   => 'Mínimo 6 caracteres',
            'password_confirmation.same'     => 'Las contraseñas no coinciden',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors'  => $validator->errors(),
            ], 422);
        }

        $resetOtp = PasswordResetOtp::where('email', $request->phone)
            ->where('token', $request->reset_token)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$resetOtp) {
            return response()->json([
                'success' => false,
                'message' => 'Token inválido o expirado',
                'error'   => 'invalid_token',
            ], 400);
        }

        try {
            $user = User::where('whatsapp_number', $request->phone)->first();

            $user->update(['password' => Hash::make($request->password)]);
            $resetOtp->markAsUsed();
            $user->tokens()->delete();

            $this->notifyPasswordChanged($user);

            $newToken = $user->createToken('password_reset', ['driver:access'])->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Contraseña actualizada correctamente',
                'data'    => [
                    'auth_token' => $newToken,
                    'user'       => [
                        'id'    => $user->id,
                        'name'  => $user->name,
                        'phone' => $user->whatsapp_number,
                    ],
                ],
            ]);

        } catch (\Exception $e) {
            Log::error('Password reset failed', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar contraseña',
            ], 500);
        }
    }

    /**
     * Resend OTP
     */
    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|exists:users,whatsapp_number',
        ], [
            'phone.required' => 'El número de teléfono es requerido',
            'phone.exists'   => 'Este número no está registrado',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors'  => $validator->errors(),
            ], 422);
        }

        $recentOtp = PasswordResetOtp::where('email', $request->phone)
            ->where('is_used', false)
            ->where('created_at', '>', now()->subSeconds(60))
            ->first();

        if ($recentOtp) {
            $remaining = 60 - now()->diffInSeconds($recentOtp->created_at);
            return response()->json([
                'success'   => false,
                'message'   => 'Espere antes de reenviar',
                'countdown' => (int) $remaining,
            ], 429);
        }

        return $this->sendOtp($request);
    }

    protected function notifyPasswordChanged(User $user): void
    {
        try {
            $message = "✅ *Contraseña Actualizada*\n\nHola {$user->name},\nTu contraseña fue cambiada exitosamente.\n\nSi no fuiste tú, contacta soporte inmediatamente.";
            $this->metaWhatsApp->sendMessage($user->whatsapp_number, $message);
        } catch (\Exception $e) {
            Log::error('Password change WhatsApp notify failed', ['error' => $e->getMessage()]);
        }
    }

    protected function maskPhone(string $phone): string
    {
        $len = strlen($phone);
        if ($len <= 4) return $phone;
        return str_repeat('*', $len - 4) . substr($phone, -4);
    }
}
