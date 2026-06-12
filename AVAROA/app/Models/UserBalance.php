<?php

// 5. app/Models/UserBalance.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBalance extends Model
{
    protected $table = 'user_balances';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'balance',
        'locked_balance',
        'total_deposited',
        'total_withdrawn'
    ];

    protected $casts = [
        'balance'          => 'decimal:2',
        'locked_balance'   => 'decimal:2',
        'total_deposited'  => 'decimal:2',
        'total_withdrawn'  => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper: Available balance for trading
    public function getAvailableBalanceAttribute()
    {
        return $this->balance - $this->locked_balance;
    }

    // Create or update balance safely
    public static function updateBalance($userId, $amount, $type = 'add')
    {
        $amount = abs((float) $amount); // Ensure positive number

        return self::where('user_id', $userId)->update([
            'balance' => \DB::raw("balance " . ($type === 'add' ? '+' : '-') . " {$amount}"),
            'updated_at' => now(),
        ]);
    }
}
