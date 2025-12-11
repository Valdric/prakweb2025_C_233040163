<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model {
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // relation: category has many posts
    public function posts() {
        return $this->hasMany(Post::class);
    }

    // set slug automatically
    public static function booted() {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
}
