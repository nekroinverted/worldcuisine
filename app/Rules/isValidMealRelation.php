<?php

namespace App\Rules;

use App\Meal;
use Illuminate\Contracts\Validation\Rule;

class isValidMealRelation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $isValidMealRelation = true;
        $relationships = splitStringToArray($value, ',');

        foreach ($relationships as $relationship) {
            if (method_exists(Meal::class, $relationship)) {
                $isValidMealRelation = true;
            } else {
                $isValidMealRelation = false;
                break;
            }
        }

        return $isValidMealRelation;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'with parameter has to be a list of one or more valid relations separated with the ,';
    }
}
