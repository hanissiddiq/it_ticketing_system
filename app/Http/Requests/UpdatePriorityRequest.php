<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePriorityRequest extends FormRequest
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
                Rule::unique('priorities')->ignore($this->priority),
            ],

            'name'=>'required|max:50',

            'color'=>'required',

            'response_time'=>'required|integer|min:1',

            'resolution_time'=>'required|integer|min:1',

            'is_active'=>'boolean'

        ];
    }
}