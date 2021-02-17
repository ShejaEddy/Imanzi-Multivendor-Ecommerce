<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Banner;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Banner::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'slug' => Str::slug($faker->name),
        'photo' => $faker->image('public/storage/photos/Banner',400,100, null, false),
        'description' => $faker->paragraph,
        'status' => 'active'
    ];
});
