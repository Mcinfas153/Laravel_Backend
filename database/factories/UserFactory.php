<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt($faker->password), // secret
        'remember_token' => str_random(17),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'city' => $faker->city,
        'zip_code' => $faker->numberBetween(9000,90000),
        'street' => $faker->streetName,
        'mobil' => $faker->phoneNumber,
        'fisat_level' => $faker->numberBetween(1,3),
    ];
});
