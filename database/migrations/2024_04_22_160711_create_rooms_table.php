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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description", 250);
            $table->unsignedBigInteger("game_id");
            $table->unsignedBigInteger("owner");
            $table->timestamps();
            $table->foreign("game_id")->references("id")->on("games")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("owner")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
