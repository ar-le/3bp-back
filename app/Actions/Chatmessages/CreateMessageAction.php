<?php

namespace App\Actions\Chatmessages;

use App\Models\Chatmessage;
use App\Models\ChatMessageInfo;
use App\Models\User;
use Illuminate\Support\Arr;
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
        //Si se recibe el id de un personaje, se guarda el personaje como autor y el id del mod
        if(Arr::exists($request, 'character') && !empty($request['character']))
        {
            $user = User::findOrFail($request['character']);
            $mod = Auth::user();
        }
        //Si no hay personaje, el usuario logueado es el autor
        else
        {
            $user = Auth::user();
            $mod = null;
        }

        $message = Chatmessage::create([
            'content' => $request['content'],
            'mod_id' => $mod ? $mod->id : null,
        ]);

        //insertar en relación ternaria
        ChatMessageInfo::create([
            'user_id' => $user->id,
            'chatroom_id' => $request['chatroom'],
            'chatmessage_id' => $message->id
        ]);

        return $message;

    }
}
