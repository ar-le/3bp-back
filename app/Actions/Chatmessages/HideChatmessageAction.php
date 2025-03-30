<?php

namespace App\Actions\Chatmessages;

use App\Models\Chatmessage;

class HideChatmessageAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute($chatmessageId)
    {
        $message = Chatmessage::findOrFail($chatmessageId);
        $message->update(['hidden' => true]);
        return $message;
    }
}
