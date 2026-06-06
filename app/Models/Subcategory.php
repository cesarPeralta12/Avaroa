<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'parent_category_id',
        'category_id',
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }

}
