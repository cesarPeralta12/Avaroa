<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_online',
        'license_number',
        'profile_photo',
        'status',
        'is_verified',
        'approval_status',
        'current_lat',
        'current_long',
        'last_location_update',
        'score',
        'total_ratings',
        'penalties',
        'acceptance_rate',
        'cooldown_end',
        'online_since',
        'utilization_rate',
    ];

    protected $casts = [
        'is_online' => 'boolean',
        'is_verified' => 'boolean',
        'current_lat' => 'float',
        'current_long' => 'float',
        'score' => 'float',
        'acceptance_rate' => 'float',
        'utilization_rate' => 'float',
        'last_location_update' => 'datetime',
        'cooldown_end' => 'datetime',
        'online_since' => 'datetime',
    ];

    // 🔗 Relationships

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // One driver → many vehicles
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'driver_id');
    }

    // Correct relation (FIXED ❗)
    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class, 'driver_id');
    }
    public function documents()
    {
        return $this->hasMany(DriverDocument::class);
    }
    public function driverRequests(): HasMany
    {
        return $this->hasMany(DriverRequest::class, 'driver_id');
    }
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available')->where('is_online', true);
    }
public function wallet()
{
    return $this->hasOne(Wallet::class);
}
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function getAvailabilityStatusAttribute()
    {
        if (!$this->is_online) return 'offline';
        return $this->status;
    }
    public function primaryVehicle(): ?Vehicle
    {
        return $this->vehicles()->where('is_active', true)->first()
            ?? $this->vehicles()->first();
    }

    /**
     * Alias for backward compatibility in views
     */
    public function getVehicleAttribute(): ?Vehicle
    {
        return $this->primaryVehicle();
    }
}
