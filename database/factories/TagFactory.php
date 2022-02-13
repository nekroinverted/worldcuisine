<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Language;
use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    static $counter = 1;
    $locales = Language::pluck('lang');
    $tags = [];

    foreach ($locales as $locale) {
       $tags[$locale] = [
           'title' => 'Title for tag-' .$counter. ' on '. $locale . ' language',
           'slug' => 'slug-for-tag-' . $counter. '-on-'. $locale . '-language'
       ];
    }
    $counter++;


   return $tags;
});
