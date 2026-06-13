<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Trip;

class EnsureDriverIsActive
{
    // Statuses that indicate a trip is still in progress
    private const ACTIVE_TRIP_STATUSES = ['accepted', 'driver_arrived', 'picked_up', 'in_progress'];

    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'No autenticado'], 401);
        }

        // Always allow these regardless of account status
        if ($request->is('*/broadcasting/auth') ||
            $request->is('*/auth/logout') ||
            $request->is('*/auth/refresh')) {
            return $next($request);
        }

        $driver = $user->driver;

        // Hard block: admin disabled the account
        if (!$user->is_active) {
            // If the driver has an active trip, allow trip-related endpoints so they
            // can finish the service before being kicked out.
            if ($driver && $this->hasActiveTrip($driver->id) && $this->isTripEndpoint($request)) {
                return $next($request);
            }

            return response()->json([
                'success'          => false,
                'account_disabled' => true,
                'message'          => 'Tu cuenta ha sido deshabilitada. Contacta con soporte.',
            ], 403);
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

    private function hasActiveTrip(int $driverId): bool
    {
        return Trip::where('driver_id', $driverId)
            ->whereIn('status', self::ACTIVE_TRIP_STATUSES)
            ->exists();
    }

    // Endpoints the driver needs to complete or update an ongoing trip
    private function isTripEndpoint(Request $request): bool
    {
        return $request->is('*/deliveries/*/status') ||
               $request->is('*/deliveries/*/complete') ||
               $request->is('*/deliveries/*/complete-simple') ||
               $request->is('*/deliveries/*/pod') ||
               $request->is('*/deliveries/active') ||
               $request->is('*/driver/location');
    }
}
