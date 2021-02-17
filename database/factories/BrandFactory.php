<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'slug' => Str::slug($faker->name),
        'status' => 'active',
        'seller_id' => 3
    ];
});
