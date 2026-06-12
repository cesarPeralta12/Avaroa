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
        return self::label($this->type);
    }

    /**
     * Etiqueta legible del catálogo oficial AVAROA.
     * Acepta tanto las claves canónicas (moto, auto, minivan, camion, torito, bicicleta)
     * como las claves legacy (automovil, camioneta, vagoneta) por compatibilidad.
     */
    public static function label(?string $type): string
    {
        return self::canonicalLabels()[self::canonicalType($type)] ?? ($type ?? 'Vehículo');
    }

    /**
     * Normaliza un tipo legacy a la clave canónica del catálogo oficial AVAROA.
     */
    public static function canonicalType(?string $type): ?string
    {
        if ($type === null) return null;
        $map = [
            'motorcycle' => 'moto',
            'motocicleta' => 'moto',
            'moto' => 'moto',
            'car' => 'auto',
            'automovil' => 'auto',
            'automóvil' => 'auto',
            'auto' => 'auto',
            'minivan' => 'minivan',
            'van' => 'minivan',
            'vagoneta' => 'minivan',
            'truck' => 'camion',
            'camion' => 'camion',
            'camión' => 'camion',
            'camioneta' => 'camion',
            'pickup' => 'camion',
            'torito' => 'torito',
            'bicicleta' => 'bicicleta',
            'bicycle' => 'bicicleta',
        ];
        return $map[mb_strtolower($type)] ?? mb_strtolower($type);
    }

    /**
     * Catálogo oficial: clave canónica → etiqueta visible.
     */
    public static function canonicalLabels(): array
    {
        $vehicles = config('avaroa.vehicles', []);
        $labels = [
            'moto'      => '🛵 Motocicleta',
            'auto'      => '🚗 Auto',
            'minivan'   => '🚐 Minivan',
            'camion'    => '🚚 Camión',
            'torito'    => '🚜 Torito',
            'bicicleta' => '🚲 Bicicleta',
        ];
        foreach ($vehicles as $key => $cfg) {
            $canonical = self::canonicalType($key);
            if (isset($cfg['label'], $cfg['icon']) && $canonical) {
                $labels[$canonical] = trim($cfg['icon'] . ' ' . $cfg['label']);
            }
        }
        return $labels;
    }

    /**
     * Servicios permitidos para un tipo de vehículo (claves canónicas).
     */
    public static function allowedServices(?string $type): array
    {
        $canonical = self::canonicalType($type);
        $vehicles = config('avaroa.vehicles', []);
        foreach ($vehicles as $key => $cfg) {
            if (self::canonicalType($key) === $canonical) {
                return $cfg['services'] ?? [];
            }
        }
        return [];
    }
}
