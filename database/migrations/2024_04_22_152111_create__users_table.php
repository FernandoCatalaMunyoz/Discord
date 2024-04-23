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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("nickName", 50)->unique();
            $table->string("fullName", 50);
            $table->string("email", 50)->unique();
            $table->string("password");
            $table->enum('role', ["super_admin", "admin", "user"])->default("user");
            $table->boolean("is_active")->default(true); //preguntar esto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
