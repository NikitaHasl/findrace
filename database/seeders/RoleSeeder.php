<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role' => 'Пользователь',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'Администратор',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'Организатор',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
