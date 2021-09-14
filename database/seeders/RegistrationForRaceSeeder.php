<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationForRaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registrations_for_race')->insert($this->getData());
    }

    public function getData(): array
    {
        $data = [];
        $faker = Factory::create('RU_ru');
        for ($i = 1; $i < 8; $i++) {
            $data[] = [
                'race_id' => $faker->numberBetween(1, 10),
                'user_id' => $faker->unique()->numberBetween(1, 10),
                'status_of_race_id' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
