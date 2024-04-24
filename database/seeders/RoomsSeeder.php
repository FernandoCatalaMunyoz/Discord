<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("rooms")->insert(
            [
                'name' => 'Fornite-1',
                'description' => 'Rat kids room',
                'game_id' => 1,
                'owner' => rand(2, 10),
                'created_at' => now(),
                'updated_at' => now()

            ]
        );
        DB::table("rooms")->insert(
            [
                'name' => 'Fornite-2',
                'description' => 'Rat kids room',
                'game_id' => 1,
                'owner' => rand(2, 10),
                'created_at' => now(),
                'updated_at' => now()

            ]
        );
        DB::table("rooms")->insert(
            [
                'name' => 'Fornite-3',
                'description' => 'Rat kids room',
                'game_id' => 2,
                'owner' => rand(2, 10),
                'created_at' => now(),
                'updated_at' => now()

            ]
        );
    }
}
