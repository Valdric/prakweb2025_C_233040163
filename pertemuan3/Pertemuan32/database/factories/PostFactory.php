<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(6);
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title).'-'.Str::random(5),
            'excerpt' => $this->faker->paragraph(),
            'body' => $this->faker->paragraphs(5, true),
        ];
    }
}
