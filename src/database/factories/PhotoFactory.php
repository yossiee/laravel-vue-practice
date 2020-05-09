<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Photo;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'id' => Str::random(12),
        'user_id' => fn() => factory(User::class)->create()->id(),
        'filename' => Str::random(12) . '.jpg',
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime()
    ];
});
