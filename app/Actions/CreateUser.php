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
            'avatar' => (isset($request['base64Avatar']) && $request['base64Avatar'] != null) ?
                leerImagen($request['base64Avatar'], $request['extension'], 'avatars')
                : null,
            'role' => 'user',
            'points' =>  0,
            'team_id' => null,
            'accepts_cookies'=> isset($request['accepts_cookies']) ? $request['accepts_cookies'] : false,
            'accepts_communication'=> isset($request['accepts_communication']) ? $request['accepts_communication'] : false
        ]);
    }
}
