<?php

namespace App\Rules;

use App\Category;
use Illuminate\Contracts\Validation\Rule;

class isValidCategory implements Rule
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
        $category = Category::find($value);
        return ($value == '!NULL' || $value == 'NULL' || $category);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Category has to be NULL, !NULL or valid category ID.';
    }
}
