<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\ProductReview;
use App\User;
use Faker\Generator as Faker;

$factory->define(ProductReview::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'product_id' => 1,
        'rate' => $faker->numberBetween(1, 5),
        'status' => 'active',
        'review' => 'Amen kabisa'
    ];
});
