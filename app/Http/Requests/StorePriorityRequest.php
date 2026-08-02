<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePriorityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'code'=>'required|max:10|unique:priorities',

            'name'=>'required|max:50',

            'color'=>'required',

            'response_time'=>'required|integer|min:1',

            'resolution_time'=>'required|integer|min:1',

            'is_active'=>'boolean'

        ];
    }
}