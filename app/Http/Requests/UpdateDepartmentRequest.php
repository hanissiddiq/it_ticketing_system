<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => [
                'required',
                'max:20',
                Rule::unique('departments')->ignore($this->department),
            ],
            'name' => ['required','max:100'],
            'description' => ['nullable'],
            'is_active' => ['boolean'],
        ];
    }
}
