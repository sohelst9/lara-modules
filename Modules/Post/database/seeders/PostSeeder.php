<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('posts')->insert([
                'user_id' => fake()->randomElement([1, 2, 7]),
                'title' => Str::title(fake()->sentence(rand(3, 6))),
                'content' => fake()->paragraph(rand(3, 7)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
