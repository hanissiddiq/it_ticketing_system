<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return auth()->check();
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

            'assigned_to' => [
                'nullable',
                'exists:users,id',
            ],

            'status' => [
                'required',
                Rule::in([
                    'NEW',
                    'OPEN',
                    'ASSIGNED',
                    'IN_PROGRESS',
                    'PENDING',
                    'ESCALATED',
                    'RESOLVED',
                    'CLOSED',
                    'CANCELLED',
                ]),
            ],

            'due_at' => [
                'nullable',
                'date',
            ],

        ];
    }

    /**
     * Attribute Name
     */
    public function attributes(): array
    {
        return [

            'subject' => 'Subject',

            'description' => 'Description',

            'department_id' => 'Department',

            'category_id' => 'Category',

            'sub_category_id' => 'Sub Category',

            'priority_id' => 'Priority',

            'assigned_to' => 'Assigned To',

            'status' => 'Status',

            'due_at' => 'Due Date',

        ];
    }

    /**
     * Custom Messages
     */
    public function messages(): array
    {
        return [

            'subject.required' =>
                'Subject wajib diisi.',

            'description.required' =>
                'Deskripsi wajib diisi.',

            'department_id.required' =>
                'Department wajib dipilih.',

            'category_id.required' =>
                'Category wajib dipilih.',

            'sub_category_id.required' =>
                'Sub Category wajib dipilih.',

            'priority_id.required' =>
                'Priority wajib dipilih.',

            'status.required' =>
                'Status wajib dipilih.',

            'status.in' =>
                'Status tidak valid.',

        ];
    }
}