<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\VirtualClass;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(VirtualClass::class, function (Faker $faker) {
    return [
        'class_name' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'class_code' => (string) Str::uuid()
    ];
});
