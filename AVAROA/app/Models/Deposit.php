<?php

// 3. app/Models/Deposit.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $table = 'deposits';

    protected $fillable = [
        'user_id',
        'amount',
        'charge',
        'final_amount',
        'payment_method',
        'utr',
        'trx',
        'detail',
        'status',
        'admin_feedback',
        'from_api'
    ];

    protected $casts = [
        'amount'       => 'decimal:2',
        'charge'       => 'decimal:2',
        'final_amount' => 'decimal:2',
    ];

    const STATUS_PENDING   = 0;
    const STATUS_SUCCESS   = 1;
    const STATUS_FAILED    = 2;
    const STATUS_CANCELLED = 3;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            0 => '<span class="badge bg-warning">Pending</span>',
            1 => '<span class="badge bg-success">Success</span>',
            2 => '<span class="badge bg-danger">Failed</span>',
            3 => '<span class="badge bg-secondary">Cancelled</span>',
        };
    }
}
