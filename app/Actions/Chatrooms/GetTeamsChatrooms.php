<?php

namespace App\Actions\Chatrooms;

use App\Models\Chatroom;

class GetTeamsChatrooms
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }

    public function execute()
    {
        $chatrooms = Chatroom::has('team')->get();
        return $chatrooms;
    }
}
