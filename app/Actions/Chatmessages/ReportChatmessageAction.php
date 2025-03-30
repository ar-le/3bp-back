<?php

namespace App\Actions\Chatmessages;

use App\Models\Chatmessage;

class ReportChatmessageAction
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
        $message->update([
            'complaints' => $message->complaints +1
        ]);

        return $message;
    }
}
