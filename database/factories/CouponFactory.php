<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Coupon;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'code'=>Str::random(6),
        'type'=>$faker->randomElement(['fixed','percent']),
        'value'=>$faker->numberBetween(1,100),
        'status'=>'active',
        'seller_id'=>3
    ];
});
