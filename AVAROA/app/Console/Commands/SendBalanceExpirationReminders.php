<?php

namespace App\Console\Commands;

use App\Mail\BalanceExpirationReminder;
use App\Models\Wallet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendBalanceExpirationReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallets:send-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders to drivers before balance expiration (7, 3, 1 days)';

    /**
     * Reminder thresholds in days.
     *
     * @var array<int>
     */
    protected array $thresholds = [7, 3, 1];

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $today = Carbon::today();
        $totalSent = 0;

        foreach ($this->thresholds as $days) {
            $targetDate = $today->copy()->addDays($days)->endOfDay();

            $wallets = Wallet::where('balance', '>', 0)
                ->where('is_blocked', false)
                ->where(function ($query) {
                    $query->where('wallet_status', '!=', 'expired')
                          ->orWhereNull('wallet_status');
                })
                ->whereNotNull('balance_expiration_date')
                ->whereDate('balance_expiration_date', $targetDate->toDateString())
                ->with(['driver.user'])
                ->get();

            if ($wallets->isEmpty()) {
                continue;
            }

            $this->info("Processing {$days}-day reminders for {$wallets->count()} wallets...");

            foreach ($wallets as $wallet) {
                $driver = $wallet->driver;
                $user = $driver?->user;

                if (!$user || empty($user->email)) {
                    $this->warn("Skipping Wallet ID {$wallet->id}: no driver email found.");
                    continue;
                }

                try {
                    Mail::to($user->email)->send(new BalanceExpirationReminder($wallet, $days));
                    $totalSent++;
                    $this->info("Sent {$days}-day reminder to {$user->email} (Wallet #{$wallet->id})");
                } catch (\Exception $e) {
                    $this->error("Failed to send reminder to {$user->email}: " . $e->getMessage());
                }
            }
        }

        $this->info("Total reminder emails sent: {$totalSent}");
        return self::SUCCESS;
    }
}
