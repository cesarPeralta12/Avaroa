<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'conversation_id',
        'customer_id',
        'driver_id',
        'vehicle_id',
        'vehicle_type',
        'service_type',
        'origin_url',
        'origin_lat',
        'origin_lng',
        'origin_address',
        'destination_url',
        'destination_lat',
        'destination_lng',
        'destination_address',
        'type',
        'scheduled_time',
        'price',
        'estimated_fare',
        'currency',
        'payment_method',
        'num_passengers',
        'trunk_required',
        'stops',
        'cargo_type',
        'weight',
        'volume',
        'photos',
        'notes',
        'status',
        'eta',
        'distance',
        'actual_time_to_pickup',
        'cancellation_reason',
        'quote_id',
        'payment_id',
        'pod_id',
        'accepted_at',        // ADD THIS
        'driver_arrived_at',  // ADD THIS
        'picked_up_at',       // ADD THIS
        'started_at',         // ADD THIS
        'completed_at',       // ADD THIS
        'cancelled_at',       // ADD THIS
        'cancelled_by'
    ];
    
    // Add casts for date fields
    protected $casts = [
        'accepted_at' => 'datetime',
        'driver_arrived_at' => 'datetime',
        'picked_up_at' => 'datetime',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'scheduled_time' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
    
    protected $appends = ['status_color'];

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'NEW' => 'info',
            'COLLECTING_DATA' => 'secondary',
            'QUOTED' => 'primary',
            'CONFIRMED' => 'success',
            'DISPATCHING' => 'warning',
            'ASSIGNED' => 'success',
            'PICKUP' => 'info',
            'IN_TRIP' => 'primary',
            'COMPLETED' => 'success',
            'CANCELLED' => 'danger',
            'FAILED' => 'dark',
            default => 'secondary'
        };
    }

    // Relationships
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function quote()
    {
        return $this->belongsTo(PricingQuote::class, 'quote_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function pod()
    {
        return $this->belongsTo(ProofOfDelivery::class, 'pod_id');
    }
    
    public function proofOfDelivery()
    {
        return $this->belongsTo(ProofOfDelivery::class, 'pod_id');
    }
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function driverRequests(): HasMany
    {
        return $this->hasMany(DriverRequest::class);
    }

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(ConversationSession::class, 'conversation_id');
    }

    public function statusHistories()
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }
}