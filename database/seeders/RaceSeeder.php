<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('races')->insert($this->getData());
    }

    public function getData(): array
    {
        $data = [];
        $faker = Factory::create('RU_ru');
        for ($i = 1; $i <= 10; $i++) {
            $data [] = [
                'title' => $faker->realText(10),
                'city_id' => $faker->numberBetween(1, 20),
                'type_of_race_id' => $faker->numberBetween(1,4),
                'date' => $faker->dateTime(),
                'distance' => $faker->randomNumber(5),
                'description' => $faker->realText(70),
                'start' => $faker->realText(20),
                'finish' => $faker->realText(20),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}
