<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'plate_number',
        'type',
        'model',
        'year',
        'color',
        'registration_number',
        'fuel_type',
        'capacity_weight',
        'capacity_volume',
        'documents',
        'expiration_date',
        'is_active',
        'is_verified',
        'current_status',
        'last_used_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_verified' => 'boolean',
        'capacity_weight' => 'float',
        'capacity_volume' => 'float',
        'documents' => 'array',
        'expiration_date' => 'date',
        'last_used_at' => 'datetime',
    ];

    // 🔗 Relationships

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
    public function getVehicleTypeLabelAttribute()
    {
        $labels = [
            'moto' => 'Moto',
            'torito' => 'Torito',
            'automovil' => 'Automóvil',
            'vagoneta' => 'Vagoneta',
            'minivan' => 'Minivan',
            'camioneta' => 'Camioneta',
            'bicicleta' => 'Bicicleta',
        ];
        return $labels[$this->type] ?? $this->type;
    }
}
