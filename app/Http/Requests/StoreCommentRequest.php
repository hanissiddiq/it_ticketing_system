<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [

            'comment' => [
                'required',
                'string',
                'max:5000',
            ],

            'is_internal' => [
                'nullable',
                'boolean',
            ],

        ];
    }

    public function attributes(): array
    {
        return [
            'comment' => 'Komentar',
        ];
    }
}