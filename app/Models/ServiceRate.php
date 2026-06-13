<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRate extends Model
{
    protected $fillable = [
        'service_type',
        'label',
        'price_per_minute',
        'minimum_fare',
        'average_speed_kmh',
        'commission_rate',
        'passenger_surcharge_from',
        'passenger_surcharge_per_head',
        'max_passengers',
    ];

    protected $casts = [
        'price_per_minute'             => 'float',
        'minimum_fare'                 => 'float',
        'average_speed_kmh'            => 'float',
        'commission_rate'              => 'float',
        'passenger_surcharge_per_head' => 'float',
    ];

    public static function forService(string $serviceType): ?self
    {
        return static::where('service_type', $serviceType)->first();
    }

    public function getIsPassengerServiceAttribute(): bool
    {
        return in_array($this->service_type, ['auto', 'minivan']);
    }
}
