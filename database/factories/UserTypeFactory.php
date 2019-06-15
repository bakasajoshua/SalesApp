<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Usertype;
use Faker\Generator as Faker;

$factory->define(Usertype::class, function (Faker $faker) {
    return [
        'user_type' => $faker->name,
    
    ];
});
