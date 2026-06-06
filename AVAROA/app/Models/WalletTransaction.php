<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    protected $fillable = [
        'wallet_id',
        'type',
        'amount',
        'direction',
        'reference_type',
        'reference_id',
        'created_by_admin_id',
    ];

    // 🔗 Relationships
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
public function driver()
{
    return $this->wallet?->driver();
}
    public function admin()
    {
        return $this->belongsTo(User::class, 'created_by_admin_id');
    }
}
