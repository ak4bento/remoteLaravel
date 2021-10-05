<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Date as AppDate;
use App\Permit;
use Faker\Generator as Faker;

$factory->define(AppDate::class, function (Faker $faker) {
    return [
        'permit_id' => Permit::all()->random()->id,
        'date' => $faker->date()
    ];
});
