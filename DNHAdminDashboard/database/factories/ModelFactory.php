<?php

use App\Member;
use App\Invoice;

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

$factory->define(App\Member::class, function (Faker\Generator $faker) {

    return [
        'firstname' => $faker->firstName,
        'prefix' =>$faker->name,
        'surname'  => $faker->lastName,
        'email' => $faker->email,
        'street' => $faker->streetAddress,
        'number' => 5,
        'postalCode' => $faker->postcode,
        'city' => $faker->city,
    ];
});


$factory->define(App\Invoice::class, function (Faker\Generator $faker) {

    return [
        'description' => $faker->name,
        'date' => $faker->date(),
        'member_id' => factory(App\Member::class)->create()->id,
    ];
});

