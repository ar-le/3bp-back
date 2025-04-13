<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UpdateUserAdminAction
{

    public function __construct()
    {
        //
    }

    public function execute($id, $request)
    {
        //dd($id);
        $user = User::findOrFail($id);
        Arr::forget($request, 'id');
        $user->update([
            'username' =>  $request['username'],
            'email' => $request['email'],
            'password' => !empty($request['password']) ? Hash::make($request['password']) : $user->password,
            'avatar' => (isset($request['base64Avatar']) && $request['base64Avatar'] != null) ?
                leerImagen($request['base64Avatar'], $request['extension'], 'avatars')
                : $user->avatar,
            'role' =>  $request['role'] ,
            'points' => $request['points'],
            'team_id' => !empty($request['team_id']) ? $request['team_id'] : null,
            'accepts_cookies'=> $request['accepts_cookies'] ,
            'accepts_communication'=> $request['accepts_communication'],

        ]);
        $user->save();
        return $user;
    }
}
