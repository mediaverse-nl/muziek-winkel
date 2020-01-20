<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Artists;
use Faker\Generator as Faker;

$factory->define(Artists::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
    ];
});
