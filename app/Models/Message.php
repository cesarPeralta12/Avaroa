<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'trip_id',
        'sender_type', // customer, system, driver, admin
        'sender_id',
        'content',
        'type', // text, location, image, etc.
        'status', // sent, delivered, read
        'whatsapp_id', // from webhook
    ];

    // Relationships
    public function conversation()
    {
        return $this->belongsTo(ConversationSession::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
