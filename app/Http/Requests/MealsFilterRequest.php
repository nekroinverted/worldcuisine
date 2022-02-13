<?php

namespace App\Http\Requests;

use App\Rules\isValidCategory;
use App\Rules\isValidMealRelation;
use App\Rules\isValidTag;
use App\Rules\isValidTimestamp;
use Illuminate\Foundation\Http\FormRequest;

class MealsFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lang' => 'required',
            'category' => ['nullable', new isValidCategory],
            'per_page' => 'nullable|numeric|gt:0',
            'page' => 'nullable|numeric|gt:0',
            'with' => ['nullable', new isValidMealRelation],
            'tags' => ['nullable', new isValidTag],
            'diff_time' => ['nullable', 'numeric', 'gt:0', new isValidTimestamp],
        ];
    }
}
