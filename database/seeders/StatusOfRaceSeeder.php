<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusOfRaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses_of_race')->insert([
            [
                'status' => 'Планируется',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'Происходит сейчас',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'Завершён',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'Отменён',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
