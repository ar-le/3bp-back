<?php

namespace App\Http\Requests;

use App\Rules\ValidQuantity;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetChatroomsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'textFilter' => 'nullable | string',
            'after' => ['nullable', Rule::date()->format('Y-m-d')],
            'perPage' => ['nullable', new ValidQuantity(10,20)],
            'page' => 'nullable | numeric'
        ];
    }
}
