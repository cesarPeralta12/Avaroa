<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'details',
        'image',
        'status',
        'blog_category_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }

    public function tags()
    {
        return $this->hasMany(BlogTag::class);
    }

    public function blogComments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getImagePathAttribute()
    {
        if ($this->image) {
            return $this->image;
        } else {
            return 'uploads/default/blog.png';
        }
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid =  Str::uuid()->toString();
            $user = self::getLoggedInUser(); // Call static method within the same model
            if ($user) {
                $model->user_id = $user->id;

            }
        });
    }

    public static function getLoggedInUser()
    {
        $user_session = User::where('id', Session::get('LoggedIn'))->first();
        return $user_session;
    }
}
