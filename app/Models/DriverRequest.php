<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverRequest extends Model
{
    use HasFactory;

    // Add this array to allow the database to save these values
    protected $fillable = [
        'trip_id',
        'driver_id',
        'status',
        'sent_at',
        'responded_at',
        'notes'
    ];
    protected $casts = [
        'sent_at' => 'datetime',
        'responded_at' => 'datetime'
    ];
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
