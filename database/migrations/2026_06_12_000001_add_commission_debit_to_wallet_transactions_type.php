<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Extend the ENUM to include 'commission_debit' alongside 'commission'.
        // We use a raw ALTER TABLE because Laravel's Blueprint cannot modify ENUM values.
        // We read the current ENUM values first so this is safe to run even if already applied.
        try {
            $column = DB::select("
                SELECT COLUMN_TYPE
                FROM INFORMATION_SCHEMA.COLUMNS
                WHERE TABLE_SCHEMA = DATABASE()
                  AND TABLE_NAME   = 'wallet_transactions'
                  AND COLUMN_NAME  = 'type'
            ");

            if (empty($column)) return;

            $currentType = $column[0]->COLUMN_TYPE ?? '';

            // Only alter if 'commission_debit' is not already in the ENUM
            if (str_contains($currentType, 'commission_debit')) return;

            // Build the new ENUM by appending 'commission_debit'
            // e.g. enum('topup','commission','adjustment') → enum('topup','commission','adjustment','commission_debit')
            $newType = rtrim($currentType, ')') . ",'commission_debit')";

            DB::statement("ALTER TABLE wallet_transactions MODIFY COLUMN `type` {$newType}");
        } catch (\Exception $e) {
            // If the column is not an ENUM (e.g. plain VARCHAR), nothing to do
            \Illuminate\Support\Facades\Log::warning('wallet_transactions type ENUM migration skipped: ' . $e->getMessage());
        }
    }

    public function down(): void
    {
        // Reversing an ENUM extension is risky (data may use the new value).
        // Left intentionally as no-op.
    }
};
