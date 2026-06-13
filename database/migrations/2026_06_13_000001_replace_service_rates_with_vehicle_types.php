<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private const RATES = [
        ['service_type' => 'moto',      'label' => 'Motocicleta', 'speed' => 40.00, 'surcharge' => false],
        ['service_type' => 'auto',      'label' => 'Auto',        'speed' => 30.00, 'surcharge' => true],
        ['service_type' => 'minivan',   'label' => 'Minivan',     'speed' => 26.00, 'surcharge' => true],
        ['service_type' => 'camion',    'label' => 'Camión',      'speed' => 15.00, 'surcharge' => false],
        ['service_type' => 'torito',    'label' => 'Torito',      'speed' => 26.00, 'surcharge' => false],
        ['service_type' => 'bicicleta', 'label' => 'Bicicleta',   'speed' => 15.00, 'surcharge' => false],
    ];

    public function up(): void
    {
        // Preserve the current commission rate before wiping the table
        $existingCommission = DB::table('service_rates')->value('commission_rate') ?? 0.1300;

        DB::table('service_rates')->truncate();

        $now = now();
        foreach (self::RATES as $r) {
            DB::table('service_rates')->insert([
                'service_type'                => $r['service_type'],
                'label'                       => $r['label'],
                'price_per_minute'            => 1.1500,
                'minimum_fare'                => 7.00,
                'average_speed_kmh'           => $r['speed'],
                'commission_rate'             => $existingCommission,
                'passenger_surcharge_from'    => $r['surcharge'] ? 4    : null,
                'passenger_surcharge_per_head'=> $r['surcharge'] ? 2.00 : null,
                'max_passengers'              => $r['surcharge'] ? 4    : null,
                'created_at'                  => $now,
                'updated_at'                  => $now,
            ]);
        }
    }

    public function down(): void
    {
        DB::table('service_rates')->truncate();

        $now = now();
        foreach ([
            ['service_type' => 'taxi',         'label' => 'Taxi',          'speed' => 25, 'surcharge' => true],
            ['service_type' => 'mototaxi',      'label' => 'Mototaxi',      'speed' => 25, 'surcharge' => false],
            ['service_type' => 'carga',         'label' => 'Carga',         'speed' => 25, 'surcharge' => false],
            ['service_type' => 'carga_pequena', 'label' => 'Carga pequeña', 'speed' => 25, 'surcharge' => false],
            ['service_type' => 'delivery',      'label' => 'Delivery',      'speed' => 25, 'surcharge' => false],
            ['service_type' => 'compras',       'label' => 'Compras',       'speed' => 25, 'surcharge' => false],
        ] as $r) {
            DB::table('service_rates')->insert([
                'service_type'                => $r['service_type'],
                'label'                       => $r['label'],
                'price_per_minute'            => 1.1500,
                'minimum_fare'                => 7.00,
                'average_speed_kmh'           => $r['speed'],
                'commission_rate'             => 0.1300,
                'passenger_surcharge_from'    => $r['surcharge'] ? 4    : null,
                'passenger_surcharge_per_head'=> $r['surcharge'] ? 2.00 : null,
                'max_passengers'              => $r['surcharge'] ? 4    : null,
                'created_at'                  => $now,
                'updated_at'                  => $now,
            ]);
        }
    }
};
