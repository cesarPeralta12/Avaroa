<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetOtp;
use App\Models\User;
use App\Services\MetaWhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
     * Step 1: Send OTP to BOTH WhatsApp AND Email
     * WhatsApp uses Template (works outside 24h window) + Free-form (if inside window)
     */
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'Ingrese un correo válido',
            'email.exists' => 'Este correo no está registrado',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Generate 6-digit OTP
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $token = Str::random(64);

            // Invalidate previous OTPs
            PasswordResetOtp::where('email', $request->email)
                ->where('is_used', false)
                ->update(['is_used' => true]);

            // Create new OTP
            PasswordResetOtp::create([
                'email' => $request->email,
                'otp' => $otp,
                'token' => $token,
                'expires_at' => now()->addMinutes(10),
            ]);

            $user = User::where('email', $request->email)->first();

            // Send to BOTH channels (independent of each other)
            $whatsappSent = false;
            $emailSent = false;
            $errors = [];

            // 1. Send WhatsApp (Template first - works 24/7)
            try {
                $whatsappSent = $this->sendOtpViaWhatsAppTemplate($user, $otp);
            } catch (\Exception $e) {
                $errors[] = 'WhatsApp: ' . $e->getMessage();
                Log::error('WhatsApp OTP exception', ['error' => $e->getMessage()]);
            }

            // 2. Send Email (Always try, regardless of WhatsApp)
            try {
                $emailSent = $this->sendOtpViaEmail($user, $otp);
            } catch (\Exception $e) {
                $errors[] = 'Email: ' . $e->getMessage();
                Log::error('Email OTP exception', ['error' => $e->getMessage()]);
            }

            Log::info('OTP delivery attempt', [
                'user_id' => $user->id,
                'whatsapp_sent' => $whatsappSent,
                'email_sent' => $emailSent,
                'errors' => $errors,
            ]);

            // Build channels array
            $channels = [];
            if ($whatsappSent) $channels[] = 'whatsapp';
            if ($emailSent) $channels[] = 'email';

            // Fail only if BOTH failed
            if (empty($channels)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al enviar el código por ambos canales. Intente nuevamente.',
                    'debug' => config('app.debug') ? $errors : null,
                ], 500);
            }

            // Success if at least one worked
            return response()->json([
                'success' => true,
                'message' => 'Código enviado a ' . implode(' y ', $channels),
                'data' => [
                    'email' => $request->email,
                    'mask' => $this->maskEmail($request->email),
                    'expires_in' => 600,
                    'countdown' => 60,
                    'channels' => $channels,
                    'delivered_via' => $channels,
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
     * Send OTP via WhatsApp Template (Works outside 24h window)
     */
    protected function sendOtpViaWhatsAppTemplate(User $user, string $otp): bool
    {
        $phone = $user->whatsapp_number ?? $user->phone;

        if (empty($phone)) {
            Log::info('No phone number for WhatsApp', ['user_id' => $user->id]);
            return false;
        }

        try {
            // Use template message - works even outside 24h window
            // Template format: Hello {{1}}, your code is {{2}}. Valid for {{3}}.
            $templateSent = $this->metaWhatsApp->sendTemplateMessage(
                $phone,
                'otp_verification_sp', // Your template name
                [
                    $user->name ?? 'Usuario',  // {{1}} - Name
                    $otp,                       // {{2}} - OTP Code
                    '10 minutos'               // {{3}} - Expiry
                ]
            );

            if ($templateSent) {
                Log::info('OTP sent via WhatsApp Template', [
                    'user_id' => $user->id,
                    'phone' => $phone
                ]);
                return true;
            }

            // If template fails, try free-form as fallback (only works inside 24h)
            return $this->sendOtpViaWhatsAppFreeForm($user, $otp);

        } catch (\Exception $e) {
            Log::error('WhatsApp Template failed', [
                'error' => $e->getMessage(),
                'user_id' => $user->id,
                'phone' => $phone
            ]);
            
            // Try free-form fallback
            return $this->sendOtpViaWhatsAppFreeForm($user, $otp);
        }
    }

    /**
     * Send OTP via WhatsApp Free-form (Only works inside 24h window)
     */
    protected function sendOtpViaWhatsAppFreeForm(User $user, string $otp): bool
    {
        $phone = $user->whatsapp_number ?? $user->phone;
        
        if (empty($phone)) return false;

        try {
            $message = "🔐 *Recuperación de Contraseña*\n\n"
                     . "Hola {$user->name},\n\n"
                     . "Tu código es: *{$otp}*\n"
                     . "⏱️ Válido por 10 minutos";

            $sent = $this->metaWhatsApp->sendMessage($phone, $message);

            if ($sent) {
                Log::info('OTP sent via WhatsApp Free-form', [
                    'user_id' => $user->id,
                    'phone' => $phone
                ]);
                return true;
            }

            return false;

        } catch (\Exception $e) {
            Log::error('WhatsApp Free-form failed', [
                'error' => $e->getMessage(),
                'user_id' => $user->id
            ]);
            return false;
        }
    }

    /**
     * Send OTP via Email (Always works if SMTP configured)
     */
    protected function sendOtpViaEmail(User $user, string $otp): bool
    {
        try {
            $subject = '🔐 Código de Recuperación - Delivery Avaroa';

            $body = "Hola {$user->name},\n\n"
                  . "Tu código de verificación es: {$otp}\n\n"
                  . "Este código es válido por 10 minutos.\n\n"
                  . "Si no solicitaste este código, ignora este correo.\n\n"
                  . "Saludos,\nEquipo Delivery Avaroa";

            // Try multiple mail methods if one fails
            try {
                Mail::raw($body, function ($message) use ($user, $subject) {
                    $message->to($user->email)
                            ->subject($subject);
                });
            } catch (\Exception $e) {
                // If Laravel mail fails, try direct SMTP or log for queue
                Log::error('Laravel mail failed, trying alternative', ['error' => $e->getMessage()]);
                
                // You can implement alternative mail logic here
                throw $e;
            }

            Log::info('OTP sent via email', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);
            return true;

        } catch (\Exception $e) {
            Log::error('Email OTP failed', [
                'error' => $e->getMessage(),
                'user_id' => $user->id,
                'email' => $user->email
            ]);
            return false;
        }
    }

    /**
     * Step 2: Verify OTP
     */
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|string|size:6',
        ], [
            'email.required' => 'El correo es requerido',
            'otp.required' => 'El código es requerido',
            'otp.size' => 'El código debe tener 6 dígitos',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $resetOtp = PasswordResetOtp::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$resetOtp) {
            return response()->json([
                'success' => false,
                'message' => 'Código inválido o expirado',
                'error' => 'invalid_otp',
            ], 400);
        }

        $resetOtp->update(['expires_at' => now()->addMinutes(15)]);

        return response()->json([
            'success' => true,
            'message' => 'Código verificado correctamente',
            'data' => [
                'reset_token' => $resetOtp->token,
                'email' => $request->email,
                'next_step' => 'new_password',
            ],
        ]);
    }

    /**
     * Step 3: Reset Password
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'reset_token' => 'required|string',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|same:password',
        ], [
            'email.required' => 'El correo es requerido',
            'reset_token.required' => 'Token de reset requerido',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'Mínimo 6 caracteres',
            'password_confirmation.same' => 'Las contraseñas no coinciden',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $resetOtp = PasswordResetOtp::where('email', $request->email)
            ->where('token', $request->reset_token)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$resetOtp) {
            return response()->json([
                'success' => false,
                'message' => 'Token inválido o expirado',
                'error' => 'invalid_token',
            ], 400);
        }

        try {
            $user = User::where('email', $request->email)->first();

            $user->update(['password' => Hash::make($request->password)]);
            $resetOtp->markAsUsed();
            $user->tokens()->delete();

            // Notify both channels
            $this->notifyPasswordChanged($user);

            $newToken = $user->createToken('password_reset', ['driver:access'])->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Contraseña actualizada correctamente',
                'data' => [
                    'auth_token' => $newToken,
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
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
     * Notify both channels of password change
     */
    protected function notifyPasswordChanged(User $user): void
    {
        $phone = $user->whatsapp_number ?? $user->phone;
        
        // WhatsApp notification (template if outside 24h)
        if (!empty($phone)) {
            try {
                $message = "✅ *Contraseña Actualizada*\n\nHola {$user->name},\nTu contraseña fue cambiada exitosamente.";
                $sent = $this->metaWhatsApp->sendMessage($phone, $message);
                
                if (!$sent) {
                    // Try template
                    $this->metaWhatsApp->sendTemplateMessage(
                        $phone,
                        'password_changed_notification',
                        [$user->name]
                    );
                }
            } catch (\Exception $e) {
                Log::error('Password change WhatsApp notify failed', ['error' => $e->getMessage()]);
            }
        }

        // Email notification
        try {
            Mail::raw("Hola {$user->name},\n\nTu contraseña ha sido cambiada exitosamente.\n\nSi no fuiste tú, contacta soporte.", 
                function ($message) use ($user) {
                    $message->to($user->email)
                            ->subject('Contraseña Actualizada - Delivery Avaroa');
                });
        } catch (\Exception $e) {
            Log::error('Password change email notify failed', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Resend OTP
     */
    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Check cooldown
        $recentOtp = PasswordResetOtp::where('email', $request->email)
            ->where('is_used', false)
            ->where('created_at', '>', now()->subSeconds(60))
            ->first();

        if ($recentOtp) {
            $remaining = 60 - now()->diffInSeconds($recentOtp->created_at);
            return response()->json([
                'success' => false,
                'message' => 'Espere antes de reenviar',
                'countdown' => (int) $remaining,
            ], 429);
        }

        return $this->sendOtp($request);
    }

    protected function maskEmail(string $email): string
    {
        $parts = explode('@', $email);
        $name = $parts[0];
        $domain = $parts[1] ?? '';
        $maskedName = substr($name, 0, 2) . str_repeat('*', max(0, strlen($name) - 2));
        return $maskedName . '@' . $domain;
    }
}