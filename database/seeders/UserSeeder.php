<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert(
            [
                'nickName' => 'super_admin',
                'fullName' => 'super_admin',
                'email' => 'super_admin@super_admin.com',
                'password' => Hash::make('123456'),
                'role' => 'super_admin',
                'created_at' => now(),
                'updated_at' => now() // ver si funciona bien el updated
            ],

        );
    }
}
