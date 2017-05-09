<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Member::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->numberBetween(1000,9999),
        'firstname' => $faker->name,
        'surname' => $faker->name,
        'email' => $faker->safeEmail,
        'street' => $faker->streetAddress,
        'number' => $faker->randomNumber(),
        'postalCode' => $faker->postcode,
        'city' => $faker->city,

    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Boat::class, function (Faker\Generator $faker) {
    return [
        'member_id' => factory(App\Member::class)->create()->id,
        'boatname' => $faker->name,
        'boatlength' => $faker->numberBetween(1,25),
        'mainboat' => $faker->boolean(50),
    ];
});
