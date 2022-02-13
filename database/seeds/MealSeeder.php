<?php

use App\Ingredient;
use App\Meal;
use App\Tag;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Meal::class, 50)->create();

        foreach(Meal::all() as $meal){
            $tags = Tag::inRandomOrder()->take(rand(1,3))->pluck('id');
            $ingredients = Ingredient::inRandomOrder()->take(rand(1,3))->pluck('id');
            $meal->tags()->attach($tags);
            $meal->ingredients()->attach($ingredients);
        }
    }
}
