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

$factory->define(App\Category::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->name,
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


$factory->define(App\Transaction::class, function (Faker\Generator $faker){
    return [
        'transactionname' => $faker->name,
        'amount' => $faker->biasedNumberBetween($min = 1, $max = 200, $function = 'sqrt'),
        'category_id' => $faker->biasedNumberBetween($min = 0, $max = 7, $function = 'sqrt'),
        'customername' => $faker->name,
    ];
});

