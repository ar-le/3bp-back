<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Fluent;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'username' => [
                'required',
                'string',
                'min:3',
                'unique:users,username',
                'not_regex:/[\s@]+/'
                ],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'avatar' => 'sometimes|string',
            'extension' => [Rule::excludeIf(!$this->has('avatar') || $this->avatar == null), 'required', 'in:png,jpg,gif,jpeg,webp'],
            'accepts_cookies' => 'required|boolean|accepted',
            'accepts_communication' => 'required|boolean|accepted'
        ];
    }

}
