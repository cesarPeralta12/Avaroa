<?php

namespace App\Http\Controllers;

use App\Events\TripTrackingUpdated;
use App\Models\Trip;
use App\Models\TripLocation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TrackingController extends Controller
{
    private const ACTIVE_STATUSES = ['assigned', 'accepted', 'driver_arrived', 'in_progress', 'picked_up'];

    /**
     * Página pública de rastreo.
     * Ruta: GET /track/{token}
     * Sin auth — cualquier persona con el link puede verlo.
     */
    public function show(string $token): View
    {
        $trip = Trip::where('tracking_token', $token)
            ->with(['driver.user', 'driver.vehicles'])
            ->first();

        if (!$trip) {
            return view('tracking.ended', [
                'reason' => 'invalid',
                'trip'   => null,
            ]);
        }

        // Si el viaje ya no está activo, mostrar pantalla de finalizado
        if (!in_array($trip->status, self::ACTIVE_STATUSES)) {
            return view('tracking.ended', [
                'reason' => $trip->status,
                'trip'   => $trip,
            ]);
        }

        // Última ubicación conocida
        $lastLocation = TripLocation::where('tracking_token', $token)
            ->latest('recorded_at')
            ->first();

        return view('tracking.show', compact('trip', 'token', 'lastLocation'));
    }

    /**
     * API para la app del conductor — envía ubicación en tiempo real.
     * Ruta: POST /api/track/{token}/location
     * Sin auth — protegido solo por el token secreto del viaje.
     */
    public function updateLocation(Request $request, string $token): JsonResponse
    {
        $request->validate([
            'lat'      => 'required|numeric|between:-90,90',
            'lng'      => 'required|numeric|between:-180,180',
            'heading'  => 'nullable|numeric|between:0,360',
            'speed'    => 'nullable|numeric|min:0',
            'accuracy' => 'nullable|numeric|min:0',
        ]);

        $trip = Trip::where('tracking_token', $token)->first();

        if (!$trip) {
            return response()->json(['error' => 'Token inválido'], 404);
        }

        // Solo permitir si el viaje está activo
        $activeStatuses = ['assigned', 'accepted', 'driver_arrived', 'in_progress', 'picked_up'];
        if (!in_array($trip->status, $activeStatuses)) {
            return response()->json(['error' => 'El viaje no está activo'], 422);
        }

        // Guardar en historial
        TripLocation::create([
            'trip_id'        => $trip->id,
            'tracking_token' => $token,
            'lat'            => $request->lat,
            'lng'            => $request->lng,
            'heading'        => $request->heading,
            'speed'          => $request->speed,
            'accuracy'       => $request->accuracy,
            'recorded_at'    => now(),
        ]);

        // Broadcast al canal público del token
        $driverName = $trip->driver?->user?->name ?? 'Conductor';

        broadcast(new TripTrackingUpdated(
            token:       $token,
            lat:         (float) $request->lat,
            lng:         (float) $request->lng,
            heading:     $request->heading ? (float) $request->heading : null,
            speed:       $request->speed   ? (float) $request->speed   : null,
            driver_name: $driverName,
            status:      $trip->status,
        ));

        return response()->json(['ok' => true, 'ts' => now()->toISOString()]);
    }

    /**
     * Devuelve la última ubicación conocida del conductor.
     * Ruta: GET /track/{token}/ping  (pública, sin auth)
     */
    public function ping(string $token): JsonResponse
    {
        $trip = Trip::where('tracking_token', $token)->first();

        if (!$trip) {
            return response()->json(['error' => 'Token inválido'], 404);
        }

        $loc = TripLocation::where('tracking_token', $token)
            ->latest('recorded_at')
            ->first();

        $isActive = in_array($trip->status, self::ACTIVE_STATUSES);

        return response()->json([
            'lat'     => $loc ? (float) $loc->lat     : null,
            'lng'     => $loc ? (float) $loc->lng     : null,
            'heading' => $loc ? (float) $loc->heading : null,
            'speed'   => $loc ? (float) $loc->speed   : null,
            'status'  => $trip->status,
            'ts'      => $loc?->recorded_at?->toISOString(),
            'active'  => $isActive,
            'ended'   => !$isActive,
        ]);
    }

    /**
     * Genera (o devuelve) el tracking_token de un viaje.
     * Ruta: POST /admin/trips/{id}/tracking-token
     */
    public function generateToken(int $tripId): JsonResponse
    {
        $trip = Trip::findOrFail($tripId);

        if (!$trip->tracking_token) {
            $trip->tracking_token = Str::random(32);
            $trip->save();
        }

        $url = url('/track/' . $trip->tracking_token);

        return response()->json([
            'token' => $trip->tracking_token,
            'url'   => $url,
        ]);
    }
}
