<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') == 'local') {
            for ($i = 1; $i < 25; $i++) {
                DB::table('tags')->insert([
                    'name' => Str::random(rand(0,20))
                ]);
            }
        }
    }
}
