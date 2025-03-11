<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CreateUser
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute(array $request)
    {
        return User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'avatar' => (isset($request['avatar']) && $request['avatar'] != null) ?
                leerImagen($request['avatar'], $request['extension'], 'avatars')
                : null,
            'role' => isset($request['role']) ? $request['role'] : 'user',
            'points' => isset($request['points']) ? $request['points'] : 0,
            'team_id' => isset($request['team_id']) ? $request['team_id'] : null,
        ]);
    }
}
