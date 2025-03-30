<?php

namespace App\Actions\Chatmessages;

use App\Models\Chatmessage;

class DeleteChatmessageAction
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
        $message = Chatmessage::findOrFail($chatmessageId)->delete();

        return $message;
    }
}
