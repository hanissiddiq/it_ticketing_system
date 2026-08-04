<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketAssignmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [

            'assigned_to' => [

                'required',

                'exists:users,id',

            ],

            'notes' => [

                'nullable',

                'string',

                'max:1000',

            ],

        ];
    }

    public function attributes(): array
    {
        return [

            'assigned_to' => 'Assigned To',

            'notes' => 'Notes',

        ];
    }

    public function messages(): array
    {
        return [

            'assigned_to.required' =>
                'Petugas IT Support wajib dipilih.',

            'assigned_to.exists' =>
                'Petugas yang dipilih tidak ditemukan.',

            'notes.max' =>
                'Catatan maksimal 1000 karakter.',

        ];
    }
}