<?php

namespace App\Http\Requests;

use App\Models\Chatroom;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PutChatroomUser extends FormRequest
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
        $chatroom =  Chatroom::findOrFail($this->id);
        //Rule::unique('users')->ignore($user->id)]
        return [
            'id' =>'required|numeric',
            'name' => ['required','string','min:3', Rule::unique('chatrooms')->ignore($chatroom->id)],
            'description' => 'required|string',
        ];
    }
}
