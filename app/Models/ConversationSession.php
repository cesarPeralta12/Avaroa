<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'flow_type',
        'language',
        'state',
        'data',
        'missing_data',
        'trip_id',
        'last_message_at',
        'escalated_to_human',
    ];

    protected $casts = [
        'missing_data' => 'array',
        'last_message_at' => 'datetime',
        'escalated_to_human' => 'boolean',
    ];
    // Valid states
    public const STATES = [
        'START',
        'ASK_SERVICE',
        'ASK_PICKUP',
        'ASK_DESTINATION',
        'CALCULATING_PRICE',
        'SHOW_PRICE',
        'ASK_INSTRUCTIONS',
        'SEARCHING_DRIVER',
        'DRIVER_ASSIGNED',
        'DRIVER_EN_ROUTE',
        'ARRIVED',
        'IN_PROGRESS',
        'COMPLETED',
        'CANCELLED'
    ];
    /* ---------------- Relationships ---------------- */

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'conversation_id');
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
