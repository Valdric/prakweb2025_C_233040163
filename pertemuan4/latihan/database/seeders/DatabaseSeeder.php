<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // buat user default
        $user = User::factory()->create([
            'name' => 'Admin Default',
            'email' => 'admin@example.com',
        ]);

        // TAMBAHKAN CATEGORY DEFAULT DISINI
        $cat1 = Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi'
        ]);

        $cat2 = Category::create([
            'name' => 'Tutorial',
            'slug' => 'tutorial'
        ]);

        $cat3 = Category::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan'
        ]);

        // Contoh create beberapa post dummy
        Post::factory(5)->create([
            'user_id' => $user->id,
            'category_id' => $cat1->id
        ]);

        Post::factory(2)->create([
            'user_id' => $user->id,
            'category_id' => $cat2->id
        ]);
    }
}
