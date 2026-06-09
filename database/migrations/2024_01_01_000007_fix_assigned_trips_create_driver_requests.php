<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Data fix: trips created by admin with status='assigned' never had
 * DriverRequest records, so drivers couldn't see them in the app.
 *
 * This migration:
 *  1. Finds trips with status='assigned' that have a driver_id set
 *     but no DriverRequest row.
 *  2. Creates the missing DriverRequest records.
 *  3. Changes their status from 'assigned' → 'pending' so the
 *     /deliveries/available endpoint returns them to the driver.
 *
 * Safe to run multiple times (checks existence before inserting).
 */
return new class extends Migration
{
    public function up(): void
    {
        // Trips assigned to a driver but without a DriverRequest record
        $trips = DB::table('trips')
            ->where('status', 'assigned')
            ->whereNotNull('driver_id')
            ->whereNotExists(function ($q) {
                $q->select(DB::raw(1))
                  ->from('driver_requests')
                  ->whereColumn('driver_requests.trip_id', 'trips.id');
            })
            ->get(['id', 'driver_id']);

        foreach ($trips as $trip) {
            DB::table('driver_requests')->insert([
                'trip_id'      => $trip->id,
                'driver_id'    => $trip->driver_id,
                'status'       => 'pending',
                'sent_at'      => now(),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            DB::table('trips')
                ->where('id', $trip->id)
                ->update(['status' => 'pending']);
        }

        $count = count($trips);
        if ($count > 0) {
            \Illuminate\Support\Facades\Log::info(
                "[Migration 000007] Fixed {$count} assigned trip(s): created DriverRequest records and reset status to pending."
            );
        }
    }

    public function down(): void
    {
        // No destructive rollback — data fix only
    }
};
