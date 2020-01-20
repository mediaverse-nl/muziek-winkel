<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Albums;
use Faker\Generator as Faker;

$factory->define(Albums::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'artist_id' => factory('App\Artists')->create()->id,
        'artwork' => '',
        'genre' => '',
    ];
});
