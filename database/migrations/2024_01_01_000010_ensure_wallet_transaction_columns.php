<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wallet_transactions', function (Blueprint $table) {
            if (!Schema::hasColumn('wallet_transactions', 'reference_type')) {
                $table->string('reference_type')->nullable();
            }
            if (!Schema::hasColumn('wallet_transactions', 'reference_id')) {
                $table->string('reference_id')->nullable();
            }
            if (!Schema::hasColumn('wallet_transactions', 'created_by_admin_id')) {
                $table->unsignedBigInteger('created_by_admin_id')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('wallet_transactions', function (Blueprint $table) {
            $table->dropColumn(['reference_type', 'reference_id', 'created_by_admin_id']);
        });
    }
};
