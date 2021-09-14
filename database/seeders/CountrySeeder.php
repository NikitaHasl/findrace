<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert($this->getData());
    }

    public function getData(): array
    {
        $faker = Factory::create('RU_ru');
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'continent_id' => $faker->numberBetween(1, 5),
                'country' => $faker->unique()->country(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}

