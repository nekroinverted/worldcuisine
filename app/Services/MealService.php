<?php

namespace App\Services;

use App\Http\Requests\MealsFilterRequest;
use App\Meal;

class MealService
{

    public function filterMeals(MealsFilterRequest $request)
    {
        $meals = (new Meal())->newQuery();
        if ($request->has('with')) {
            $relations = splitStringToArray($request['with'], ',');
            foreach ($relations as $relation) {
                $meals->with($relation);
            }
        }

        if ($request->has('tags')) {
            $tags = splitStringToArray($request['tags'], ',');
            foreach ($tags as $tag) {
                $meals->whereHas('tags', function ($query) use ($tag) {
                    $query->where('tags.id', $tag);
                });
            }
        }

        if ($request->has('category')) {
            if ($request['category'] == 'NULL') {
                $meals->whereNull('category_id');
            } else if ($request['category'] == '!NULL') {
                $meals->whereNotNull('category_id');
            } else {
                $meals->where('category_id', $request['category']);
            }
        }

        if ($request->has('diff_time')) {
            $date = date('Y-m-d H:i:s', $request['diff_time']);
            $meals->where('created_at', '>', $date)->orWhere('updated_at', '>', $date)->orWhere('deleted_at', '>', $date);
        }
        $perPage = 15;
        $page = 1;
        if ($request->has('per_page')) {
            $perPage = $request['per_page'];
        }

        if ($request->has('page')) {
            $page = $request['page'];
        }

        return $meals->paginate($perPage, ['*'], 'page', $page);
    }
}
