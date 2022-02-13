<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Language;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    static $counter = 1;
    $locales = Language::pluck('lang');
    $categories = [];

    foreach ($locales as $locale) {
       $categories[$locale] = [
           'title' => 'Title for category-' .$counter. ' on '. $locale . ' language',
           'slug' => 'slug-for-tag-' . $counter. '-on-'. $locale . '-language'
       ];
    }
    $counter++;


   return $categories;
});
