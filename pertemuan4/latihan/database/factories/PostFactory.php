<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

class PostFactory extends Factory {
    public function definition() {
        $title = $this->faker->sentence(6);
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'excerpt' => $this->faker->paragraph(2),
            'body' => $this->faker->paragraphs(6, true),
            'image' => null,
            'published_at' => now(),
        ];
    }
}   