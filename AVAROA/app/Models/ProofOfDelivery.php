<?php
// app/Models/ProofOfDelivery.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProofOfDelivery extends Model
{
    protected $table = 'proof_of_deliveries';

    protected $fillable = [
        'trip_id',
        'photo_url',
        'photo_urls',
        'signature',
        'receiver_name',
        'notes',
        'timestamp',
        'geolocation_lat',
        'geolocation_long'
    ];

    protected $casts = [
        'photo_urls' => 'array',
        'timestamp' => 'datetime',
        'geolocation_lat' => 'decimal:8',
        'geolocation_long' => 'decimal:8'
    ];

    /**
     * Get the trip associated with the proof of delivery
     */
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    /**
     * Get formatted timestamp
     */
    public function getFormattedTimestampAttribute(): string
    {
        return $this->timestamp ? $this->timestamp->format('d M Y H:i:s') : 'N/A';
    }

    /**
     * Get all photos as array
     */
    public function getAllPhotosAttribute(): array
    {
        $photos = [];

        if ($this->photo_url) {
            $photos[] = $this->photo_url;
        }

        if ($this->photo_urls && is_array($this->photo_urls)) {
            $photos = array_merge($photos, $this->photo_urls);
        }

        return $photos;
    }
}
