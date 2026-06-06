<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'user_id',
        'amount',
        'method', // cash, bank_transfer, QR, card
        'status', // pending, paid, unpaid, refunded
        'transaction_id',
        'difference_from_quote', // for leakage control
    ];

    // Relationships
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
