<?php

namespace Database\Seeders;

use Domain\Tag\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if (in_array(env('APP_ENV'), ['local', 'testing'])) {
            Tag::factory()->count(50)->create();
        }
    }
}
