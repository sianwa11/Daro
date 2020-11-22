<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserBiodata;
use Faker\Generator as Faker;

$factory->define(UserBiodata::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'phone_number' => $faker->e164PhoneNumber,
        'school' => $faker->company,
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country
    ];
});
