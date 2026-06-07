<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('driver_documents', function (Blueprint $table) {
            if (!Schema::hasColumn('driver_documents', 'original_name')) {
                $table->string('original_name')->nullable()->after('file_path');
            }
            if (!Schema::hasColumn('driver_documents', 'file_size')) {
                $table->unsignedBigInteger('file_size')->nullable()->after('original_name');
            }
            if (!Schema::hasColumn('driver_documents', 'mime_type')) {
                $table->string('mime_type')->nullable()->after('file_size');
            }
            if (!Schema::hasColumn('driver_documents', 'rejection_reason')) {
                $table->text('rejection_reason')->nullable()->after('status');
            }
            if (!Schema::hasColumn('driver_documents', 'expiry_date')) {
                $table->date('expiry_date')->nullable()->after('rejection_reason');
            }
            if (!Schema::hasColumn('driver_documents', 'verified_at')) {
                $table->timestamp('verified_at')->nullable()->after('expiry_date');
            }
            if (!Schema::hasColumn('driver_documents', 'verified_by')) {
                $table->unsignedBigInteger('verified_by')->nullable()->after('verified_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('driver_documents', function (Blueprint $table) {
            $columns = ['original_name', 'file_size', 'mime_type', 'rejection_reason', 'expiry_date', 'verified_at', 'verified_by'];
            foreach ($columns as $col) {
                if (Schema::hasColumn('driver_documents', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
