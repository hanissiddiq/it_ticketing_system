<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'category_id'=>'required|exists:categories,id',

            'code'=>'required|max:20|unique:sub_categories',

            'name'=>'required|max:100',

            'description'=>'nullable',

            'is_active'=>'boolean'

        ];
    }
}