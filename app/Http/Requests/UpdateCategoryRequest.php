<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'code'=>[
                'required',
                Rule::unique('categories')->ignore($this->category)
            ],

            'name'=>'required|max:100',

            'icon'=>'nullable',

            'color'=>'nullable',

            'description'=>'nullable',

            'is_active'=>'boolean'

        ];
    }
}