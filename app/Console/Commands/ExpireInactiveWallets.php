<?php

namespace App\Console\Commands;

use App\Mail\BalanceExpiredNotification;
use App\Models\Wallet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ExpireInactiveWallets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallets:expire-inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire wallet balances after 30 days of inactivity (no recharge) and notify drivers';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $days = (int) config('avaroa.wallet.expiration_days', 30);
        $threshold = now()->subDays($days);
        $this->info("Expiring wallets with no recharge in the last {$days} days.");
        $count = 0;
        $emailCount = 0;

        Wallet::where('balance', '>', 0)
            ->whereNotNull('last_recharge_date')
            ->where('last_recharge_date', '<=', $threshold)
            ->where(function ($query) {
                $query->where('wallet_status', '!=', 'expired')
                      ->orWhereNull('wallet_status');
            })
            ->with(['driver.user'])
            ->chunkById(100, function ($wallets) use (&$count, &$emailCount) {
                foreach ($wallets as $wallet) {
                    $expiredAmount = $wallet->balance;

                    if ($wallet->expireBalance()) {
                        $count++;
                        $this->info(
                            "Expired Wallet ID: {$wallet->id} | " .
                            "Driver: {$wallet->driver_id} | " .
                            "Amount: {$expiredAmount} Bs"
                        );

                        // Send expiration email
                        $user = $wallet->driver?->user;
                        if ($user && !empty($user->email)) {
                            try {
                                Mail::to($user->email)->send(new BalanceExpiredNotification($wallet, $expiredAmount));
                                $emailCount++;
                                $this->info("Sent expiration notice to {$user->email}");
                            } catch (\Exception $e) {
                                $this->error("Failed to send expiration email to {$user->email}: " . $e->getMessage());
                            }
                        } else {
                            $this->warn("Wallet #{$wallet->id}: no email found for expiration notification.");
                        }
                    }
                }
            });

        $this->info("Total wallets expired: {$count}");
        $this->info("Total expiration emails sent: {$emailCount}");
        return self::SUCCESS;
    }
}
