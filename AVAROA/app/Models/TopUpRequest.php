<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUpRequest extends Model
{
    protected $fillable = [
        'driver_id',
        'wallet_id',
        'amount',
        'method',
        'status',
        'proof_file_url',
        'reviewed_by_admin_id',
        'review_note',
    ];

    // 🔗 Relationships
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by_admin_id');
    }
}
