<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOfRaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types_of_race')->insert([
            [
                'type_of_race' => 'Бег',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_of_race' => 'Плавание',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_of_race' => 'Велогонка',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_of_race' => 'Триатлон',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
