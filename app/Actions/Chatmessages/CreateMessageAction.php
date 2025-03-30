<?php

namespace App\Actions\Chatmessages;

use App\Models\Chatmessage;
use App\Models\ChatMessageInfo;
use Illuminate\Support\Facades\Auth;

class CreateMessageAction
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
        $message = Chatmessage::create([
            'content' => $request['content'],
            'mod_id' => $request['mod'] ?? null,
        ]);

        //insertar en relación tenraria
        ChatMessageInfo::create([
            'user_id' => Auth::user()->id,
            'chatroom_id' => $request['chatroom'],
            'chatmessage_id' => $message->id
        ]);

        return $message;

    }
}
