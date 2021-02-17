<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Shipping;
use App\User;
use Faker\Generator as Faker;

$factory->define(Shipping::class, function (Faker $faker) {
    return [
        'type' => $faker->name,
        'price' => 100.00,
        'status' => 'active',
        'seller_id' => 3
    ];
});