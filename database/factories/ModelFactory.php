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
$factory->define(VirtualExpo\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(VirtualExpo\Event::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->paragraph,
        'ticket_price' => $faker->randomFloat(2, $min = 50, $max = 500),
        'image' => $faker->sentence,
        'location_id' => 1,
    ];
});

$factory->define(VirtualExpo\Location::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'address' => $faker->sentence,
        'latitude' => $faker->sentence,
        'longitude' => $faker->sentence,
        'state_id' => 1,
    ];
});

$factory->define(VirtualExpo\Stand::class, function (Faker\Generator $faker) {
    return [
        'code' => '1',
        'booked' => 0,
        'free' => 0,
        'price' => 100,
        'image' => $faker->sentence,
        'event_id' => 1
    ];
});

$factory->define(VirtualExpo\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->sentence,
        'logo' => $faker->sentence
    ];
});

$factory->define(VirtualExpo\Contact::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'email' => $faker->sentence,
        'telephone' => $faker->sentence,
        'administrator' => 0
    ];
});

$factory->define(VirtualExpo\Document::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'path' => $faker->sentence
    ];
});