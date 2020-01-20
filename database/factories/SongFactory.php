<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Songs;
use Faker\Generator as Faker;

$factory->define(Songs::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'album_id' => factory('App\Albums')->create()->id,
        'track_number' => '0',
        'duration' => '0',
        'file' => 'test/test',
    ];
});
