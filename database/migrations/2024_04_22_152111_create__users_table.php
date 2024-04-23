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
<<<<<<<< HEAD:database/migrations/2024_04_22_165202_create_users.php
            $table->string('role')->default('user');
            $table->string('nickname', 50)->unique();
            $table->string('full_name', 100);
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->boolean('is_active')->default(true);
========
            $table->string("nickName", 50)->unique();
            $table->string("fullName", 50);
            $table->string("email", 50)->unique();
            $table->string("password");
            $table->enum('role', ["super_admin", "admin", "user"])->default("user");
            $table->boolean("is_active")->default(true); //preguntar esto
>>>>>>>> origin/develop:database/migrations/2024_04_22_152111_create__users_table.php
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
