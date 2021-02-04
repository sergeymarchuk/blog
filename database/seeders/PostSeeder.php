<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if (env('APP_ENV') == 'local') {
            Post::factory()->count(50)->hasTags(rand(1,3))->create();
        }
    }
}
