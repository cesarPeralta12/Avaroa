<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'balance',
        'currency',
        'is_blocked',
        'blocked_reason',
        'blocked_at',
        'last_recharge_date',
        'balance_expiration_date',
        'wallet_status',
        'expired_balance_amount',
        'expiration_reason',
    ];

    protected $casts = [
        'is_blocked' => 'boolean',
        'blocked_at' => 'datetime',
        'last_recharge_date' => 'datetime',
        'balance_expiration_date' => 'datetime',
        'expired_balance_amount' => 'decimal:2',
    ];

    // 🔗 Relationships
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function transactions()
    {
        return $this->hasMany(WalletTransaction::class);
    }

    public function topUps()
    {
        return $this->hasMany(TopUpRequest::class);
    }

    // 🔥 Business Logic
    public function credit(int|float $amount, string $type = 'topup')
    {
        $this->increment('balance', $amount);

        // Reset expiration tracking on new recharge
        if ($type === 'topup') {
            $this->update([
                'last_recharge_date' => now(),
                'balance_expiration_date' => now()->addDays(30),
                'wallet_status' => 'active',
                'expired_balance_amount' => null,
                'expiration_reason' => null,
            ]);
        }

        return $this->transactions()->create([
            'type' => $type,
            'amount' => $amount,
            'direction' => 'CREDIT',
        ]);
    }

    public function debit(int|float $amount, string $type = 'commission_debit')
    {
        if ($this->balance < $amount) {
            throw new \Exception('Insufficient balance');
        }

        $this->decrement('balance', $amount);

        return $this->transactions()->create([
            'type' => $type,
            'amount' => $amount,
            'direction' => 'DEBIT',
        ]);
    }

    /**
     * Expire balance due to 30 days of inactivity
     */
    public function expireBalance(): bool
    {
        if ($this->balance <= 0) {
            return false;
        }

        $expiredAmount = $this->balance;

        DB::transaction(function () use ($expiredAmount) {
            // Record transaction in history
            $this->transactions()->create([
                'type' => 'balance_expiration',
                'amount' => $expiredAmount,
                'direction' => 'DEBIT',
                'reference_type' => 'expiration',
                'reference_id' => '30_days_inactivity',
            ]);

            // Update wallet with expired state
            $this->update([
                'balance' => 0,
                'wallet_status' => 'expired',
                'expired_balance_amount' => $expiredAmount,
                'expiration_reason' => 'Balance expired due to 30 days of inactivity.',
                'balance_expiration_date' => now(),
            ]);
        });

        return true;
    }
}