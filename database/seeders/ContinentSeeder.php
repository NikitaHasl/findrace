<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('continents')->insert($this->getData());
    }

    public function getData():array
    {
        $faker = Factory::create('ru_RU');
        $data = [];
        for ($i = 0;$i < 5; $i++){
            $data[] = [
                'continent' => $faker->realText(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
