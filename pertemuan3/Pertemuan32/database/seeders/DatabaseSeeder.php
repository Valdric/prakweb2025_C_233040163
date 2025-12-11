<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // create users
        User::factory()->count(5)->create();

        // create categories
        Category::factory()->count(2)->create();

        // create posts
        Post::factory()->count(10)->create();

        // alternative: create posts with relationships ensured
        // User::factory(5)->create()->each(function($user) {
        //     Post::factory(rand(1,3))->create(['user_id' => $user->id]);
        // });
    }
}
