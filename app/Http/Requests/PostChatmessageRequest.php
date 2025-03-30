<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostChatmessageRequest extends FormRequest
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
            'chatroom' => 'required|numeric|exists:chatrooms,id',
            'mod_id' => 'nullable|numeric|exists:users,id',
            'content' => 'required|string|min:1'
        ];
    }
}
