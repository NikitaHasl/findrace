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
        DB::table('races')->insert([
            [
                'title' => 'Московский полумарафон',
                'city_id' => 1,
                'type_of_race_id' => 1,
                'date' => '2021-11-30 16:48:23',
                'distance' => 10,
                'description' => 'Крупнейший полумарафон России. Примите участие в масштабном беговом празднике страны и пробегите полумарафон по центральным улицам столицы',
                'start' => 'Где-то',
                'finish' => 'Где-то',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Абсолют Московский Марафон',
                'city_id' => 1,
                'type_of_race_id' => 2,
                'date' => '2021-12-30 16:48:23',
                'distance' => 30,
                'description' => 'Очень классный марафон приходи мы тебя ждем',
                'start' => 'Где-то',
                'finish' => 'Где-то',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Московский Марафон: Ночной забег',
                'city_id' => 1,
                'type_of_race_id' => 3,
                'date' => '2022-03-13 16:48:23',
                'distance' => 40,
                'description' => 'Единственный массовый забег по ночной Москве.  Вас ждут десять километров мерцающих огней и незабываемый бег в летнюю ночь.',
                'start' => 'Где-то',
                'finish' => 'Где-то',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Кросс с собаками «Быстрый пёс»',
                'city_id' => 1,
                'type_of_race_id' => 4,
                'date' => '2021-09-19 16:48:23',
                'distance' => 5,
                'description' => 'Благотворительный марафон',
                'start' => 'Где-то',
                'finish' => 'Где-то',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Марафон «Белые ночи»',
                'city_id' => 2,
                'type_of_race_id' => 1,
                'date' => '2021-09-19 16:48:23',
                'distance' => 20,
                'description' => 'Городской, международный, ночной забег',
                'start' => 'Где-то',
                'finish' => 'Где-то',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Марафон "Дорога жизни"',
                'city_id' => 2,
                'type_of_race_id' => 2,
                'date' => '2021-12-19 16:48:23',
                'distance' => 10,
                'description' => 'Городской, зимний забег',
                'start' => 'Где-то',
                'finish' => 'Где-то',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Северная столица',
                'city_id' => 2,
                'type_of_race_id' => 3,
                'date' => '2021-11-19 16:48:23',
                'distance' => 20,
                'description' => 'Пробегите по Невскому проспекту, величественным набережным и знаменитым мостам. Полюбуйтесь на главные символы города на бегу. Станьте частью нового спортивного события',
                'start' => 'Где-то',
                'finish' => 'Где-то',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
