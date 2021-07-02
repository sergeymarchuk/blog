<?php

namespace Database\Seeders;

use Domain\Attachment\Models\Attachment;
use Illuminate\Database\Seeder;

class AttachmentSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void {
        if (in_array(env('APP_ENV'), ['local', 'testing'])) {
            Attachment::factory()->count(50)->create();
        }
    }
}
