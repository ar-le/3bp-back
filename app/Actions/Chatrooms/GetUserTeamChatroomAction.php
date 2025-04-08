<?php

namespace App\Actions\Chatrooms;

use App\Models\Chatroom;
use App\Models\User;
class GetUserTeamChatroomAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute(User $user)
    {
        //si es admin puede ver las dos salas
        if ($user->role == 'admin') {
            return Chatroom::has('team')->get();
        }
        $team = $user->team;
        if ($team) {
            return [$user->team->chatroom];
        }

        return [];
    }
}
