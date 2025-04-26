<?php

namespace App\Actions\Chatmessages;

use App\Events\NewMessage;
use App\Models\Chatmessage;
use Exception;

class SendNewMessageEventAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute(Chatmessage $message, $chatroom)
    {
        try{
            event(new NewMessage($message, $chatroom));
        }
        catch(Exception $e){

        }
    }
}
