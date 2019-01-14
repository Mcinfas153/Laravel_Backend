<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\Hash;

use App\User;

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
            $table->string('login')->default('bitte eintragen');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name')->nullable;
            $table->string('last_name')->nullable;
            $table->string('mobil')->default('bitte eintragen');
            $table->string('city')->default('bitte eintragen');
            $table->string('zip_code')->default('bitte eintragen');
            $table->string('street')->default('bitte eintragen');
            $table->string('fisat_level')->default('bitte eintragen');
            $table->rememberToken();
            $table->timestamps();
        });

        /**
         *      create a test ADMIN
         */
        $newAdmin = new User();
        $newAdmin->id = 1;
        $newAdmin->first_name = 'Anton';
        $newAdmin->last_name = 'Anfang';
        $newAdmin->login = 'rossixx';
        $newAdmin->email = 'admin@rassloff.info';
        $newAdmin->password = Hash::make('saxen1971');

        $newAdmin->save();
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
