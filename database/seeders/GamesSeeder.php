<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("games")->insert(
            [
                'game_name' => 'Fornite',
                'description' => 'Juego para desestrearse y no matar a la pareja, aunq despues te entren mas ganas',
                'game_image' => 'https://assets.xboxservices.com/assets/20/38/203850f5-1bed-4912-b25f-193ee890c97f.jpg?n=Fortnite_GLP-Page-Hero-1084_876951_1920x1080.jpg',
                'created_at' => now(),
                'updated_at' => now()

            ],

        );
    }
}
