<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    /**
     * A client can have many equipments.
     */
    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    /**
     * A client can have many inspections through equipments.
     */
    public function inspections()
    {
        return $this->hasManyThrough(Inspection::class, Equipment::class);
    }
}
