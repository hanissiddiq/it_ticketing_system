<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'code'=>'required|max:20|unique:categories',

            'name'=>'required|max:100',

            'icon'=>'nullable',

            'color'=>'nullable',

            'description'=>'nullable',

            'is_active'=>'boolean'

        ];
    }
}