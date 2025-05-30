<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserAdmin
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
            'avatar' => (isset($request['base64Avatar']) && $request['base64Avatar'] != null) ?
                leerImagen($request['base64Avatar'], $request['extension'], 'avatars')
                : null,
            'role' => isset($request['role']) ? $request['role'] : 'user',
            'points' => isset($request['points']) ? $request['points'] : 0,
            'team_id' => isset($request['team_id']) ? $request['team_id'] : null,
            'accepts_cookies'=> isset($request['accepts_cookies']) ? $request['accepts_cookies'] : false,
            'accepts_communication'=> isset($request['accepts_communication']) ? $request['accepts_communication'] : false
        ]);
    }
}
