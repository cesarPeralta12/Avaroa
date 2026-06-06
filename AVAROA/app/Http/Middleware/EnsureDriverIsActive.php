<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureDriverIsActive
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user || !$user->isDriver()) {
            return response()->json([
                'success' => false,
                'message' => 'Acceso no autorizado',
            ], 403);
        }

        $driver = $user->driver;

        // Allow pending status for registration continuation
        if ($driver && in_array($driver->status, ['pending', 'under_review'])) {
            // Check if token has registration ability
            if ($request->user()->currentAccessToken()->can('driver:register')) {
                return $next($request);
            }
        }

        // For active drivers
        if (!$driver || !in_array($driver->status, ['available', 'busy', 'offline'])) {
            return response()->json([
                'success' => false,
                'message' => 'Cuenta no activa o en revisión',
                'status' => $driver?->status,
            ], 403);
        }

        return $next($request);
    }
}
