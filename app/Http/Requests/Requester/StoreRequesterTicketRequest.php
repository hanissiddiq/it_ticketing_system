<?php

namespace App\Http\Requests\Requester;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequesterTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return auth()->check()
            && auth()->user()->hasRole('User');
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        return [

            'subject' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'department_id' => [
                'required',
                'exists:departments,id',
            ],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'sub_category_id' => [
                'required',
                'exists:sub_categories,id',
            ],

            'priority_id' => [
                'required',
                'exists:priorities,id',
            ],
            'attachments' => [

                'nullable',

                'array',

            ],

            'attachments.*' => [

                'file',

                'max:5120',

                'mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx,zip',

            ],

        ];
    }

    /**
     * Custom Attribute
     */
    public function attributes(): array
    {
        return [

            'department_id' => 'Department',

            'category_id' => 'Category',

            'sub_category_id' => 'Sub Category',

            'priority_id' => 'Priority',

        ];
    }

    /**
     * Custom Message
     */
    public function messages(): array
    {
        return [

            'required' => ':attribute wajib diisi.',

            'exists' => ':attribute tidak valid.',

        ];
    }
}