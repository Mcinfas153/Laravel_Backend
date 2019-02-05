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

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'number' => $faker->numberBetween(10, 50000),
        'name' => $faker->firstName,
        'manager' => $faker->name,
        'description' => $faker->country,
        'date' => $faker->date,
        'user_id' => $faker->randomDigitNotNull,
    ];
});
