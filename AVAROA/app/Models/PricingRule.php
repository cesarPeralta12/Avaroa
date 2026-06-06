<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', // per_km, minimum, night, holiday, weight, volume, zone, etc.
        'value',
        'conditions', // json: time_range, zone_id, etc.
        'active', // bool
    ];
}
