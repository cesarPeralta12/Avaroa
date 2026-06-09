<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('trip_locations')) {
            Schema::create('trip_locations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('trip_id')->index();
                $table->string('tracking_token', 64)->index();
                $table->decimal('lat', 10, 7);
                $table->decimal('lng', 10, 7);
                $table->float('heading')->nullable();   // dirección 0-360°
                $table->float('speed')->nullable();      // km/h
                $table->float('accuracy')->nullable();   // metros
                $table->timestamp('recorded_at');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('trip_locations');
    }
};
