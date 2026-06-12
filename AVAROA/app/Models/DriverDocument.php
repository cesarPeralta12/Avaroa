<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'type',
        'file_path',
        'original_name',
        'file_size',
        'mime_type',
        'status',
        'rejection_reason',
        'verified_at',
        'verified_by',
        'expiry_date',
    ];

    protected $casts = [
        'file_size' => 'integer',
        'verified_at' => 'datetime',
        'expiry_date' => 'date',
    ];

    // 🔗 Relationships

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    // 🔥 Scopes (VERY USEFUL)

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeVerified($query)
    {
        return $query->where('status', 'verified');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function scopeExpiringSoon($query, $days = 7)
    {
        return $query->whereNotNull('expiry_date')
            ->where('expiry_date', '<=', now()->addDays($days));
    }

    // 🔥 Helper Methods

    public function isVerified(): bool
    {
        return $this->status === 'verified';
    }

    public function isExpired(): bool
    {
        return $this->expiry_date && $this->expiry_date->isPast();
    }
    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset($this->file_path) : null;
    }
}
