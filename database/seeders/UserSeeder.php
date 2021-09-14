<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    public function getData(): array
    {
        $data = [];
        $faker = Factory::create('RU_ru');
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'email' => $faker->email(),
                'gender' => $faker->numberBetween(1,2),
                'role' => 1,
                'birthday' => $faker->dateTime(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}
