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
                'room_name' => 'Fornite-1',
                'room_description' => 'Rat kids room',
                'game_id' => 1,
                'owner' => rand(2, 10),
                'created_at' => now(),
                'updated_at' => now()

            ],

        );
    }
}
