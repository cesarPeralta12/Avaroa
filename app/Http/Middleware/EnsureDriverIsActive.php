<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureDriverIsActive
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'No autenticado'], 401);
        }

        // Hard block: admin disabled the account
        if (!$user->is_active) {
            return response()->json([
                'success'          => false,
                'account_disabled' => true,
                'message'          => 'Tu cuenta ha sido deshabilitada. Contacta con soporte.',
            ], 403);
        }

        $driver = $user->driver;

        // Allow broadcasting auth without driver check
        if ($request->is('*/broadcasting/auth')) {
            return $next($request);
        }

        // Allow logout/refresh without driver active check
        if ($request->is('*/auth/logout') || $request->is('*/auth/refresh')) {
            return $next($request);
        }

        if (!$driver) {
            return response()->json(['success' => false, 'message' => 'Perfil de conductor no encontrado'], 404);
        }

        // Driver explicitly disabled or suspended
        if (in_array($driver->status, ['disabled', 'suspended', 'blocked'])) {
            return response()->json([
                'success'          => false,
                'account_disabled' => true,
                'message'          => 'Tu cuenta ha sido deshabilitada. Contacta con soporte.',
            ], 403);
        }

        return $next($request);
    }
}
