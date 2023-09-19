<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateActionUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'subject' => [
                'required',
                'min:3',
                'max:255',
                'unique:supports',
            ],
            'body' => [
                'required',
                'min:3',
                'max: 800',
            ],
        ];

        if ($this->method() === 'PUT') {
            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                // "unique:supports, subject, {$this->id}, id",
                // Único na tabela supports, mas ignore quando ID for o mesmo
                Rule::unique('supports')->ignore($this->id),
            ];
        }

        return $rules;
    }
}
