<?php

namespace App\Actions\Chatrooms;

use App\Models\Chatroom;
use App\Models\User;

class GetUserChatrooms
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
        $chatrooms = Chatroom::whereRelation('favoriteOfUsers', 'users.id', $user->id);
        if ($user->team) {
            $chatrooms =  $chatrooms->orWhereRelation('team', 'teams.id', $user->team->id);
        }
        $chatrooms = $chatrooms->get();
        return $chatrooms;
    }
}
