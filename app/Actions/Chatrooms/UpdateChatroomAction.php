<?php

namespace App\Actions\Chatrooms;

use App\Models\Chatroom;

class UpdateChatroomAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute(int $chatroomId, array $request): Chatroom
    {
        $chatroom = Chatroom::findOrFail($chatroomId);
        $chatroom->update([
            'name' => $request['name'],
            'description' => $request['description'],

        ]);
        return $chatroom;
    }
}
