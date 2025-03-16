<?php

namespace App\Actions\Chatrooms;

use App\Models\Chatroom;

class DeleteChatroomAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute(int $id)
    {
        $chatroom = Chatroom::findOrFail($id);
        $chatroom->delete();
        return $chatroom;
    }
}
