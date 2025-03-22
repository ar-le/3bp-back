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

    public function execute( array $request): Chatroom
    {
        $chatroom = Chatroom::findOrFail($request['id']);
        $chatroom->update([
            'name' => $request['name'],
            'description' => $request['description'],

        ]);
        return $chatroom;
    }
}
