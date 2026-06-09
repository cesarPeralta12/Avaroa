<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('trips', 'tracking_token')) {
            Schema::table('trips', function (Blueprint $table) {
                $table->string('tracking_token', 64)->nullable()->unique()->after('status');
            });
        }
    }

    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->dropColumn('tracking_token');
        });
    }
};
