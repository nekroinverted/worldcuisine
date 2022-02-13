<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealsFilterRequest;
use App\Services\MealService;

class MealController extends Controller
{

    public function index(MealService $mealService, MealsFilterRequest $request)
    {

        setResponseLocale($request['lang']);

        $meals = $mealService->filterMeals($request);

        return response()->json(['data' => $meals], 200);
    }

}
