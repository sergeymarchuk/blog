<?php

namespace Database\Seeders;

use Domain\Post\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void {
        if (in_array(env('APP_ENV'), ['local', 'testing'])) {
            Post::factory()->count(50)->hasTags(rand(1,3))->create();
        }
    }
}
