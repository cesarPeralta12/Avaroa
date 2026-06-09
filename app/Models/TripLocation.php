<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TripLocation extends Model
{
    protected $fillable = [
        'trip_id',
        'tracking_token',
        'lat',
        'lng',
        'heading',
        'speed',
        'accuracy',
        'recorded_at',
    ];

    protected $casts = [
        'lat'         => 'float',
        'lng'         => 'float',
        'heading'     => 'float',
        'speed'       => 'float',
        'accuracy'    => 'float',
        'recorded_at' => 'datetime',
    ];

    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }
}
