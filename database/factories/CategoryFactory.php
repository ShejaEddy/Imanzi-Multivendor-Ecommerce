<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category as ModelsCategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ModelsCategory::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'slug' => Str::slug($faker->word),
        'photo' => $faker->image('public/storage/photos/Category',200,400, null, false),
        'summary' => $faker->paragraph,
        'status' => 'active',
        'parent_id' => NULL,
        'added_by' => NULL,
        'is_parent' => 1
    ];
});
