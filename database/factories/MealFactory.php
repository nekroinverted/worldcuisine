<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Language;
use App\Meal;
use Faker\Generator as Faker;

$factory->define(Meal::class, function (Faker $faker) {
 static $counter = 1;
 $category_id = [null, Category::all()->random()->id];
 $locales = Language::pluck('lang');
 $meals = ['category_id' => $faker->randomElement($category_id)];

 foreach ($locales as $locale) {
    $meals[$locale] = [
        'title' => 'Title for meal-' .$counter. ' on '. $locale . ' language',
        'description' => 'Description for meal-' .$counter. ' on '. $locale . ' language',
    ];
 }
 $counter++;


return $meals;
});
