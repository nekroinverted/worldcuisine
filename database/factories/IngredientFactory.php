<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ingredient;
use App\Language;
use Faker\Generator as Faker;

$factory->define(Ingredient::class, function (Faker $faker) {
    static $counter = 1;
    $locales = Language::pluck('lang');
    $ingredients = [];

    foreach ($locales as $locale) {
       $ingredients[$locale] = [
           'title' => 'Title for ingredient-' .$counter. ' on '. $locale . ' language',
           'slug' => 'slug-for-ingredient-' . $counter. '-on-'. $locale . '-language'
       ];
    }
    $counter++;


   return $ingredients;
});
