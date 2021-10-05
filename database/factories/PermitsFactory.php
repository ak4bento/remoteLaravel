<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Permit;
use App\User;
use Faker\Generator as Faker;

$factory->define(Permit::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'file' => $faker->title(),
        'description' => $faker->paragraph()
    ];
});
