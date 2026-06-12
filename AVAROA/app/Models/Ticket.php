<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable; // Add this line

class Ticket extends Model
{
    use HasFactory, Notifiable; // Add Notifiable trait here

    protected $fillable = [
        'uuid', 'ticket_number', 'name', 'email', 'subject', 'status', 'user_id', 'department_id', 'related_service_id', 'priority_id'
    ];

    protected $casts = [
        'uuid' => 'string',
        'status' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();

        // Auto-generate UUID and ticket number when creating a ticket
        static::creating(function ($ticket) {
            $ticket->uuid = (string) Str::uuid();
            $ticket->ticket_number = 'TCK-' . strtoupper(uniqid()); // Simple ticket number generation logic
        });
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(TicketDepartment::class);
    }

    public function relatedService()
    {
        return $this->belongsTo(TicketRelatedService::class);
    }

    public function priority()
    {
        return $this->belongsTo(TicketPriority::class);
    }
    public function latestMessage()
    {
        return $this->hasOne(TicketMessages::class)->latestOfMany();
    }
}
