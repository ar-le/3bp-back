<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetChatmessageRequest;
use App\Http\Requests\GetChatmessagesRequest;
use App\Http\Requests\PostChatmessageRequest;
use App\Http\Resources\ChatMessageInfoCompleteResource;
use App\Http\Resources\ChatMessageInfoResource;
use App\Http\Resources\ChatmessageResource;
use App\Models\chatMessage;
use App\Services\ChatMessagesService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ChatMessageController extends Controller
{
    private ChatMessagesService $chatMessagesService;

    public function __construct(ChatMessagesService $chatMessagesService) {
        $messages = $this->chatMessagesService = $chatMessagesService;

    }


    public function index(GetChatmessagesRequest $request)
    {
        //comprobar si hay team y el user es del team - middleware?
        $messages = $this->chatMessagesService->getChatMessages($request->all());
        return ChatMessageInfoResource::collection($messages);
    }


    public function store(PostChatmessageRequest $request)
    {
        $message = $this->chatMessagesService->createChatmessage($request->all());
        $messageInfo = $message->chatmessageInfo;
        $this->chatMessagesService->sendNewMessageEvent($message, $request['chatroom']);
        return new ChatmessageInfoResource($messageInfo);
    }

    /**
     * Display the specified resource.
     */
    public function show(chatMessage $chatMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(chatMessage $chatMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, chatMessage $chatMessage)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GetChatmessageRequest $request)
    {
        $message = $this->chatMessagesService->deleteChatmessage($request->id);
        return response(null, 204);
    }

    //ocultar
    public function hide(GetChatmessageRequest $request)
    {
        $message = $this->chatMessagesService->hideChatmessage($request->id);
        return response(null, 204);
    }

    public function report(GetChatmessageRequest $request)
    {
        $message = $this->chatMessagesService->reportChatmessage($request->id);
        return response(null, 204);
    }

    public function getReported(Request $request)
    {
        $messages = $this->chatMessagesService->getReportedChatmessages($request->all());
        return ChatMessageInfoCompleteResource::collection($messages);
    }
}
