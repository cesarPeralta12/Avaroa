<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingQuote extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'distance',
        'per_minute_rate',
        'duration',
        'base_fare',
        'total_fare',
        'applied_rules', // json: night, tolls, etc.
        'inputs', // json: weight, volume, etc.
    ];

    // Relationships
    public function trip()
    {
        return $this->hasOne(Trip::class, 'quote_id');
    }
}
