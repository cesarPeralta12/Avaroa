<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'client_id',
        'worker_id',
        'chat_id',
        'client_account_type',
        'worker_account_type',
    ];

    protected $casts = [
        'request_id' => 'integer',
        'client_id' => 'integer',
        'worker_id' => 'integer',
        'chat_id' => 'string',
        'client_account_type' => 'string',
        'worker_account_type' => 'string',
    ];

    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
}
