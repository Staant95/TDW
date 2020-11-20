<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Size;
use Faker\Generator as Faker;

$factory->define(Size::class, function (Faker $faker) {
    return [
        
        'size' => $faker->numberBetween(35, 50),
    ];
});
