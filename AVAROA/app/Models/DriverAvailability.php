<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverAvailability extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'status',
        'current_lat',
        'current_lng',
        'location_address',
        'last_location_at',
        'went_online_at',
        'went_offline_at',
        'total_online_hours',
        'vehicle_types',
    ];

    /**
     * Casts for proper data handling
     */
    protected $casts = [
        'current_lat' => 'float',
        'current_lng' => 'float',
        'last_location_at' => 'datetime',
        'went_online_at' => 'datetime',
        'went_offline_at' => 'datetime',
        'vehicle_types' => 'array',
    ];

    /**
     * Relationship: Driver (User)
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    /**
     * Helper: Check if driver is online
     */
    public function isOnline(): bool
    {
        return $this->status === 'online';
    }

    /**
     * Helper: Check if driver is available for trips
     */
    public function isAvailable(): bool
    {
        return $this->status === 'online';
    }

    /**
     * Helper: Check if driver is busy
     */
    public function isBusy(): bool
    {
        return $this->status === 'busy';
    }

    /**
     * Helper: Update driver location
     */
    public function updateLocation(float $lat, float $lng, ?string $address = null): void
    {
        $this->update([
            'current_lat' => $lat,
            'current_lng' => $lng,
            'location_address' => $address,
            'last_location_at' => now(),
        ]);
    }

    /**
     * Helper: Set driver online
     */
    public function goOnline(): void
    {
        $this->update([
            'status' => 'online',
            'went_online_at' => now(),
            'went_offline_at' => null,
        ]);
    }

    /**
     * Helper: Set driver offline
     */
    public function goOffline(): void
    {
        $this->update([
            'status' => 'offline',
            'went_offline_at' => now(),
        ]);
    }

    /**
     * Helper: Set driver busy
     */
    public function setBusy(): void
    {
        $this->update([
            'status' => 'busy',
        ]);
    }

    /**
     * Helper: Set driver on break
     */
    public function setBreak(): void
    {
        $this->update([
            'status' => 'break',
        ]);
    }
}
