<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            [
                'gender' => 'Мужской',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gender' => 'Женский',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
