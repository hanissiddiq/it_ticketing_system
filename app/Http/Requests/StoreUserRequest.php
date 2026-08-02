<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

        'employee_id'=>'required|unique:users',

        'name'=>'required|max:100',

        'email'=>'required|email|unique:users',

        'password'=>'required|min:8|confirmed',

        'department_id'=>'nullable|exists:departments,id',

        'position'=>'nullable|max:100',

        'phone'=>'nullable|max:25',

        'avatar'=>'nullable|image|max:2048',

        'roles'=>'required|array'

		];
    }
}
