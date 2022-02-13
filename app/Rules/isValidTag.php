<?php

namespace App\Rules;

use App\Tag;
use Illuminate\Contracts\Validation\Rule;

class isValidTag implements Rule
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
        $isValidTag = true;
        $tags = splitStringToArray($value, ',');

        foreach($tags as $tag){
            $existing = Tag::find($tag);
            if($existing){
                $isValidTag = true;
            } else {
                $isValidTag = false;
                break;
            }
        }

        return $isValidTag;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'tags parameter has to be a list of one or more valid tags separated with the ,';
    }
}
