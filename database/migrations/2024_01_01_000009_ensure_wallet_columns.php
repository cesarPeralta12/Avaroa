<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wallets', function (Blueprint $table) {
            if (!Schema::hasColumn('wallets', 'blocked_reason')) {
                $table->string('blocked_reason')->nullable();
            }
            if (!Schema::hasColumn('wallets', 'blocked_at')) {
                $table->timestamp('blocked_at')->nullable();
            }
            if (!Schema::hasColumn('wallets', 'last_recharge_date')) {
                $table->timestamp('last_recharge_date')->nullable();
            }
            if (!Schema::hasColumn('wallets', 'balance_expiration_date')) {
                $table->timestamp('balance_expiration_date')->nullable();
            }
            if (!Schema::hasColumn('wallets', 'wallet_status')) {
                $table->string('wallet_status')->default('active');
            }
            if (!Schema::hasColumn('wallets', 'expired_balance_amount')) {
                $table->decimal('expired_balance_amount', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('wallets', 'expiration_reason')) {
                $table->string('expiration_reason')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('wallets', function (Blueprint $table) {
            $table->dropColumn([
                'blocked_reason', 'blocked_at', 'last_recharge_date',
                'balance_expiration_date', 'wallet_status',
                'expired_balance_amount', 'expiration_reason',
            ]);
        });
    }
};
