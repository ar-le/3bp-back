<?php

namespace App\Actions\Chatrooms;

use App\Models\Chatroom;

class GetChatroomsUserAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute()
    {
        $chatrooms = Chatroom::doesntHave('team')->paginate(10);
        return $chatrooms;
    }
}
