<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\ValidQuantity;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        //Según la documentación de laravel no hay que pasar user input al rule::unique por que puede haber sql injection
        $user = User::findOrFail($this->id);
        //dd($user->id);
        return [
            'id' => ['required','exists:users,id'],
            'username' => [
                'required',
                'string',
                'min:3',
                Rule::unique('users', 'username')->ignore($user->id),
                ],
            'email' => ['required','email',Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable |sometimes | min:8',
            'avatar' => 'sometimes|string',
            'extension' => [Rule::excludeIf(!$this->has('avatar') || $this->avatar == null), 'required', 'in:png,jpg,gif,jpeg,webp'],
            'accepts_cookies' => 'required|boolean|accepted',
            'accepts_communication' => 'required|boolean|accepted',
            'role' => [Rule::requiredIf(fn () => Auth::user() && Auth::user()->role == 'admin'),'string', 'in:admin,mod,user'],
            'points' => [Rule::requiredIf(fn () => Auth::user() && Auth::user()->role == 'admin'),'numeric', new ValidQuantity(0,1000)],
            'team_id' => ['nullable','in:1,2'],

        ];
    }
}
