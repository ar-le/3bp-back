<?php

namespace App\Actions\Chatmessages;

use App\Models\ChatMessageInfo;

class GetReportedChatmessagesAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }

    public function execute(array $request)
    {
        $messages = ChatMessageInfo::with(['user', 'chatmessage', 'chatroom'])->whereRelation('chatmessage', 'complaints', '>' , $request['complaintsFilter'] ?? 1);

        return $messages->orderBy('id', 'desc')->cursorPaginate(10);
    }
}
