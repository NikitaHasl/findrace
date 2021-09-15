<?php

namespace Database\Seeders;

use App\Models\Role;
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
                'id' => Role::USER_ID,
                'role' => Role::USER
            ],
            [
                'id' => Role::ADMIN_ID,
                'role' => Role::ADMIN
            ],
            [
                'id' => Role::ORGANIZER_ID,
                'role' => Role::ORGANIZER
            ],
        ]);
    }
}
