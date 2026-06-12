<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // --- Trips: requires_pod (flujo mixto taxi/delivery) ---
        if (Schema::hasTable('trips') && !Schema::hasColumn('trips', 'requires_pod')) {
            Schema::table('trips', function (Blueprint $table) {
                $table->boolean('requires_pod')->nullable()->default(null)->after('service_type');
            });
        }

        // --- Wallets: expiración de saldo por inactividad ---
        if (Schema::hasTable('wallets')) {
            Schema::table('wallets', function (Blueprint $table) {
                if (!Schema::hasColumn('wallets', 'last_recharge_date')) {
                    $table->timestamp('last_recharge_date')->nullable();
                }
                if (!Schema::hasColumn('wallets', 'balance_expiration_date')) {
                    $table->timestamp('balance_expiration_date')->nullable();
                }
                if (!Schema::hasColumn('wallets', 'wallet_status')) {
                    $table->string('wallet_status', 32)->default('active');
                }
                if (!Schema::hasColumn('wallets', 'expired_balance_amount')) {
                    $table->decimal('expired_balance_amount', 12, 2)->nullable();
                }
                if (!Schema::hasColumn('wallets', 'expiration_reason')) {
                    $table->string('expiration_reason', 255)->nullable();
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('trips') && Schema::hasColumn('trips', 'requires_pod')) {
            Schema::table('trips', function (Blueprint $table) {
                $table->dropColumn('requires_pod');
            });
        }

        if (Schema::hasTable('wallets')) {
            Schema::table('wallets', function (Blueprint $table) {
                foreach ([
                    'last_recharge_date',
                    'balance_expiration_date',
                    'wallet_status',
                    'expired_balance_amount',
                    'expiration_reason',
                ] as $col) {
                    if (Schema::hasColumn('wallets', $col)) {
                        $table->dropColumn($col);
                    }
                }
            });
        }
    }
};
