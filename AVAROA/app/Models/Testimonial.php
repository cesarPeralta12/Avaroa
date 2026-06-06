<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
     // Specify which attributes are mass assignable
     protected $fillable = [
        'client_name',
        'client_role',
        'client_image_url', // New field for image URL
        'content', // Testimonial content
    ];
}
