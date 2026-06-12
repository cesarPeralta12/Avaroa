<?php

use App\Models\Trip;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

// Public channel - any driver can listen
Broadcast::channel('delivery.requests.all', function (User $user) {
    return $user->driver !== null;
});

// Private driver channel
Broadcast::channel('driver.{driverId}', function (User $user, $driverId) {
    return (int) optional($user->driver)->id === (int) $driverId;
});

// Private trip channel
Broadcast::channel('delivery.trip.{tripId}', function (User $user, int $tripId) {
    $trip = Trip::find($tripId);
    if (!$trip) return false;

    return \App\Models\DriverRequest::where('trip_id', $tripId)
            ->where('driver_id', optional($user->driver)->id)
            ->exists()
        || optional($user->driver)->id === $trip->driver_id;
});

// Customer channel
Broadcast::channel('customer.{customerId}', function (User $user, int $customerId) {
    return $user->id === $customerId || $user->isAdmin();
});

// Trip tracking
Broadcast::channel('trip.{tripId}.tracking', function (User $user, int $tripId) {
    $trip = Trip::find($tripId);
    if (!$trip) return false;

    return $user->id === $trip->customer_id
        || optional($user->driver)->id === $trip->driver_id
        || $user->isAdmin();
});

// Admin channels
Broadcast::channel('admin.drivers', function (User $user) {
    return $user->isAdmin() || $user->role === 'dispatcher';
});

Broadcast::channel('admin.deliveries', function (User $user) {
    return $user->isAdmin() || $user->role === 'dispatcher';
});

// Online drivers presence
Broadcast::channel('drivers.online', function (User $user) {
    if (!$user->driver || !$user->driver->is_online) {
        return false;
    }

    return [
        'id' => $user->driver->id,
        'user_id' => $user->id,
        'name' => $user->name,
        'vehicle_type' => $user->driver->vehicle_type ?? 'pickup',
        'lat' => $user->driver->current_lat,
        'lng' => $user->driver->current_lng,
    ];
});