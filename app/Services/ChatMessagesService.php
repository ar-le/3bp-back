<?php

namespace App\Services;

use App\Actions\Chatmessages\CreateMessageAction;
use App\Actions\Chatmessages\DeleteChatmessageAction;
use App\Actions\Chatmessages\GetAllChatMessages;
use App\Actions\Chatmessages\GetReportedChatmessagesAction;
use App\Actions\Chatmessages\HideChatmessageAction;
use App\Actions\Chatmessages\ReportChatmessageAction;
use App\Actions\Chatmessages\SendNewMessageEventAction;
use App\Actions\Chatrooms\DeleteChatroomAction;
use App\Models\Chatmessage;

class ChatMessagesService
{
    private GetAllChatMessages $getAllChatMessages;
    private CreateMessageAction $createMessageAction;
    private SendNewMessageEventAction $sendNewMessageEventAction;
    private HideChatmessageAction $hideChatmessageAction;
    private DeleteChatmessageAction $deleteChatmessageAction;
    private ReportChatmessageAction $reportChatmessageAction;
    private GetReportedChatmessagesAction $getReportedChatmessagesAction;

    public function __construct(GetAllChatMessages $getAllChatMessages,
    CreateMessageAction $createMessageAction, SendNewMessageEventAction $sendNewMessageEventAction,
    HideChatmessageAction $hideChatmessageAction, DeleteChatmessageAction $deleteChatmessageAction,
    ReportChatmessageAction $reportChatmessageAction, GetReportedChatmessagesAction $getReportedChatmessagesAction
    )
    {
        $this->getAllChatMessages = $getAllChatMessages;
        $this->createMessageAction = $createMessageAction;
        $this->sendNewMessageEventAction = $sendNewMessageEventAction;
        $this->hideChatmessageAction = $hideChatmessageAction;
        $this->deleteChatmessageAction = $deleteChatmessageAction;
        $this->reportChatmessageAction = $reportChatmessageAction;
        $this->getReportedChatmessagesAction = $getReportedChatmessagesAction;

    }

    public function getChatMessages(array $request)  {
        return $this->getAllChatMessages->execute($request);
    }

    public function createChatmessage(array $request)
    {
        return $this->createMessageAction->execute($request);
    }

    public function sendNewMessageEvent(Chatmessage $chatmessage, $chatroomId)
    {
        return $this->sendNewMessageEventAction->execute($chatmessage, $chatroomId);
    }

    public function hideChatmessage($chatmessageId)
    {
        return $this->hideChatmessageAction->execute($chatmessageId);
    }

    public function deleteChatmessage($chatmessageId)
    {
        return $this->deleteChatmessageAction->execute($chatmessageId);
    }

    public function reportChatmessage($chatmessageId)
    {
        return $this->reportChatmessageAction->execute($chatmessageId);
    }

    public function getReportedChatmessages(array $request)
    {
        return $this->getReportedChatmessagesAction->execute($request);
    }
}

