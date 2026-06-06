<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    use HasFactory;
    // Define which fields can be mass-assigned
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'project_link',  // Change 'link' to 'project_link' for consistency with your database column
        'skills',        // Include 'skills' if necessary
    ];



}
