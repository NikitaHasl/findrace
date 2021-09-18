<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ContinentSeeder::class,
            CountrySeeder::class,
            CitySeeder::class,
            TypeOfRaceSeeder::class,
            StatusOfRaceSeeder::class,
            RaceSeeder::class,
            GenderSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            RegistrationForRaceSeeder::class,
        ]);
    }
}
