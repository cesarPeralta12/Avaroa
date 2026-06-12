<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('topup_requests')) {
            return;
        }

        Schema::create('topup_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('wallet_id');
            $table->unsignedInteger('amount');
            $table->string('method', 30)->default('WHATSAPP'); // WHATSAPP, BANK_TRANSFER, QR
            $table->string('status', 20)->default('pending');  // pending, approved, rejected
            $table->string('proof_file_url')->nullable();
            $table->unsignedBigInteger('reviewed_by_admin_id')->nullable();
            $table->text('review_note')->nullable();
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->foreign('wallet_id')->references('id')->on('wallets')->onDelete('cascade');
            $table->index(['driver_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('topup_requests');
    }
};
