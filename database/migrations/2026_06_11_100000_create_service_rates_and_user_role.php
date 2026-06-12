<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Service-specific pricing & commission
        Schema::create('service_rates', function (Blueprint $table) {
            $table->id();
            $table->string('service_type')->unique(); // taxi, mototaxi, carga, etc.
            $table->string('label');
            $table->decimal('price_per_minute', 8, 4)->default(1.15);
            $table->decimal('minimum_fare', 8, 2)->default(7.00);
            $table->decimal('average_speed_kmh', 6, 2)->default(25.00);
            $table->decimal('commission_rate', 6, 4)->default(0.1300); // 13%
            // Passenger surcharge (only relevant for taxi/mototaxi)
            $table->unsignedTinyInteger('passenger_surcharge_from')->nullable(); // from N passengers
            $table->decimal('passenger_surcharge_per_head', 8, 2)->nullable();  // extra Bs/head
            $table->unsignedTinyInteger('max_passengers')->nullable();           // max allowed
            $table->timestamps();
        });

        // Seed default rates for every service type
        $services = [
            // taxi = has passenger surcharge; mototaxi = no surcharge
            ['service_type' => 'taxi',          'label' => 'Taxi',          'surcharge' => true],
            ['service_type' => 'mototaxi',       'label' => 'Mototaxi',      'surcharge' => false],
            ['service_type' => 'carga',          'label' => 'Carga',         'surcharge' => false],
            ['service_type' => 'carga_pequena',  'label' => 'Carga pequeña', 'surcharge' => false],
            ['service_type' => 'delivery',       'label' => 'Delivery',      'surcharge' => false],
            ['service_type' => 'compras',        'label' => 'Compras',       'surcharge' => false],
        ];

        $now = now();
        foreach ($services as $svc) {
            DB::table('service_rates')->insert([
                'service_type'              => $svc['service_type'],
                'label'                     => $svc['label'],
                'price_per_minute'          => 1.15,
                'minimum_fare'              => 7.00,
                'average_speed_kmh'         => 25.00,
                'commission_rate'           => 0.1300,
                'passenger_surcharge_from'  => $svc['surcharge'] ? 4 : null,
                'passenger_surcharge_per_head' => $svc['surcharge'] ? 2.00 : null,
                'max_passengers'            => $svc['surcharge'] ? 4 : null,
                'created_at'                => $now,
                'updated_at'                => $now,
            ]);
        }

        // Add role column to users table
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('customer')->after('is_super_admin');
            });
        }

        // Set existing super admins to role = 'admin'
        DB::table('users')->where('is_super_admin', 1)->update(['role' => 'admin']);
    }

    public function down(): void
    {
        Schema::dropIfExists('service_rates');
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
