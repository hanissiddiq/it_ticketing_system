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

            'due_at' => [ 'nullable', 'date', ],

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

            'due_at' => 'Due Date',

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

            'due_at.required' => 'Due Date wajib diisi.', 
            'due_at.date' => 'Format Due Date tidak valid.',

            'notes.max' =>
                'Catatan maksimal 1000 karakter.',

        ];
    }
}