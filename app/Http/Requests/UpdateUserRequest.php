<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        $userId = $this->route('user')->id;

        return [

            'employee_id' => [
                'required',
                'max:50',
                Rule::unique('users', 'employee_id')->ignore($userId),
            ],

            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('users', 'email')->ignore($userId),
            ],

            /**
             * Password boleh kosong saat update
             */
            'password' => [
                'nullable',
                'confirmed',
                'min:8',
            ],

            'department_id' => [
                'nullable',
                'exists:departments,id',
            ],

            'position' => [
                'nullable',
                'string',
                'max:100',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:25',
            ],

            'avatar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'roles' => [
                'required',
                'array',
            ],

            'roles.*' => [
                'exists:roles,name',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ];
    }

    /**
     * Custom Attribute
     */
    public function attributes(): array
    {
        return [

            'employee_id' => 'Employee ID',

            'department_id' => 'Department',

            'phone' => 'Phone Number',

            'is_active' => 'Status',

            'roles' => 'Role',

        ];
    }

    /**
     * Custom Message
     */
    public function messages(): array
    {
        return [

            'employee_id.required' => 'Employee ID wajib diisi.',

            'employee_id.unique' => 'Employee ID sudah digunakan.',

            'name.required' => 'Nama wajib diisi.',

            'email.required' => 'Email wajib diisi.',

            'email.email' => 'Format email tidak valid.',

            'email.unique' => 'Email sudah digunakan.',

            'password.confirmed' => 'Konfirmasi password tidak sesuai.',

            'password.min' => 'Password minimal 8 karakter.',

            'department_id.exists' => 'Department tidak ditemukan.',

            'roles.required' => 'Role wajib dipilih.',

            'roles.array' => 'Role tidak valid.',

            'roles.*.exists' => 'Role tidak ditemukan.',

            'avatar.image' => 'Avatar harus berupa gambar.',

            'avatar.max' => 'Ukuran avatar maksimal 2 MB.',

        ];
    }
}