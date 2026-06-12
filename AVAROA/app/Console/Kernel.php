<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use App\Jobs\AutoCloseSimulatedTrades;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        /*
        |--------------------------------------------------------------------------
        | MAINTENANCE TASKS (Run via standard Cron)
        |--------------------------------------------------------------------------
        */

// 1. Expire inactive wallets daily at 00:01 (after midnight)
        $schedule->command('wallets:expire-inactive')->dailyAt('00:01');

        // 2. Send reminder emails daily at 09:00 (morning)
        $schedule->command('wallets:send-reminders')->dailyAt('09:00');

        /*
        |--------------------------------------------------------------------------
        | SIMULATION UPDATES (Run via standard Cron)
        |--------------------------------------------------------------------------
        */



        /*
        |--------------------------------------------------------------------------
        | 🔥 IMPORTANT NOTE ON REMOVED COMMANDS:
        | The following commands have been removed from the Scheduler:
        | 1. market:run-underlyings
        | 2. market:run-trade-manager
        | 3. psychometrics:run
        |
        | REASON: These contain "while(true)" loops. Running them here will
        | cause the scheduler to hang and eventually crash your server.
        | They MUST be run via SUPERVISOR.
        |--------------------------------------------------------------------------
        */
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
