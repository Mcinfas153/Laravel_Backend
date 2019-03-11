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
            $table->string('email')->unique();
            $table->string('password')->nullable;
            $table->string('first_name')->nullable;
            $table->string('last_name')->nullable;
            $table->string('mobil')->default('bitte eintragen');
            $table->string('city')->default('bitte eintragen');
            $table->string('zip_code')->default('bitte eintragen');
            $table->string('street')->default('bitte eintragen');
            $table->rememberToken();
            $table->timestamps();
        });

        /**
         *      create a test ADMIN
         */
        $newAdmin = new User();
        $newAdmin->id = 112;
        $newAdmin->first_name = 'Anton';
        $newAdmin->last_name = 'Anfang';
        $newAdmin->name = 'geheim';
        $newAdmin->email = 'admin@gmail.com';
        $newAdmin->password = Hash::make('geheim');

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
