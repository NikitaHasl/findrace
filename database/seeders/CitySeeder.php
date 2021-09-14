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
        DB::table('cities')->insert($this->getData());
    }

    public function getData(): array
    {
        $data = [];
        $faker = Factory::create('RU_ru');
        for ($i = 1; $i <= 20; $i++) {
            $data[] = [
                'country_id' => $faker->numberBetween(1, 10),
                'city' => $faker->unique()->city(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
