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

$factory->define(App\Category::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Transaction::class, function (Faker\Generator $faker){
    return [
        'transactionname' => $faker->name,
        'amount' => $faker->biasedNumberBetween($min = 1, $max = 200, $function = 'sqrt'),
        'category_id' => $faker->biasedNumberBetween($min = 0, $max = 7, $function = 'sqrt'),
        'customername' => $faker->name,
    ];
});