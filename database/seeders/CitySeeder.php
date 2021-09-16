<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'country_id' => 1,
                'city' => 'Москва',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 1,
                'city' => 'Санкт-Петербург',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'country_id' => 2,
                'city' => 'Минск',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
