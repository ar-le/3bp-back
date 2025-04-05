<?php

namespace App\Actions\Chatmessages;

use App\Models\Chatmessage;
use App\Models\ChatMessageInfo;
use App\Models\Chatroom;
use Illuminate\Support\Facades\Auth;

class GetAllChatMessages
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

        $messages = ChatMessageInfo::with(['user', 'chatmessage'])->where('chatroom_id',  $request['chatroom']);
        //dd($messages);
        $user = Auth::user();
        //Si es un admin devolver todos los mensajes sin filtrar
        //Si no, no devolver los ocultos
        if($user->role != 'admin')
            $messages->whereRelation('chatmessage','hidden', false);

        return $messages->orderBy('id', 'desc')->cursorPaginate(13);
    }
}
