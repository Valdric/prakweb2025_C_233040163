<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 'category_id', 'title', 'slug', 'excerpt', 'body', 'image', 'published_at'
    ];

    protected $dates = ['published_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public static function booted() {
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
