<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2024_04_22_165554_create_games.php
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string("game_name");
            $table->string("description", 250);
            $table->string("game_image");
            $table->timestamps();
            // game_image será una URL
========
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string("room_name");
            $table->string("room_description", 250);;
            $table->unsignedBigInteger("game_id");
            $table->unsignedBigInteger("owner");
            $table->timestamps();
            $table->foreign("game_id")->references("id")->on("games")->onUpdate("cascade")->onDelete("cascade");
<<<<<<< HEAD
>>>>>>>> origin/develop:database/migrations/2024_04_22_160711_create_rooms_table.php
=======
            $table->foreign("owner")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
>>>>>>> 34383a8c19cf436c6da003a19e4f0810de76e0e4
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:database/migrations/2024_04_22_165554_create_games.php
        Schema::dropIfExists('games');
========
        Schema::dropIfExists('rooms');
>>>>>>>> origin/develop:database/migrations/2024_04_22_160711_create_rooms_table.php
    }
};
