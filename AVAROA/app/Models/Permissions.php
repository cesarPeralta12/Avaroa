<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    public function children()
    {
        return $this->hasMany(Permissions::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Permissions::class, 'parent_id', 'id');
    }
}

