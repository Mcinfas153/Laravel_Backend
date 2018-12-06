<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('bitte eintragen');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('firstName')->nullable;
            $table->string('lastName')->nullable;
            $table->string('mobil')->nullable;
            $table->string('phone')->nullable;
            $table->string('city')->nullable;
            $table->string('street')->nullable;
            $table->rememberToken();
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
}
