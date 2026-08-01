<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'category_id'=>'required|exists:categories,id',

            'code'=>[
                'required',
                Rule::unique('sub_categories')->ignore($this->sub_category),
            ],

            'name'=>'required|max:100',

            'description'=>'nullable',

            'is_active'=>'boolean'

        ];
    }
}