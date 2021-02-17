<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\Models\SellerOrder;
use App\User;
use Faker\Generator as Faker;

$factory->define(SellerOrder::class, function (Faker $faker) {
    return [];
});
