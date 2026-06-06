<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'conversation_id',
        'user_id', // who performed
        'event_type', // state_change, message_sent, etc.
        'details', // json
    ];

    // Relationships
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function conversation()
    {
        return $this->belongsTo(ConversationSession::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

