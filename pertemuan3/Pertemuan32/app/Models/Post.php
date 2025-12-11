<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
