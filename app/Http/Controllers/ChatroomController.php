<?php

namespace App\Http\Controllers;

use App\Actions\Chatrooms\GetAllChatrooms;
use App\Http\Requests\GetChatroomsRequest;
use App\Http\Requests\PostChatroomUser;
use App\Http\Requests\PutChatroomUser;
use App\Http\Resources\ChatroomUserResource;
use App\Models\chatroom;
use App\Http\Requests\StorechatroomRequest;
use App\Http\Requests\UpdatechatroomRequest;
use App\Http\Resources\ChatroomAuthResource;
use App\Models\User;
use App\Services\ChatroomsService;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ChatroomController extends Controller
{
    private ChatroomsService $chatroomsService;

    public function __construct(ChatroomsService $chatroomsService)
    {
        $this->chatroomsService = $chatroomsService;
    }

    /**
     * Lista completa de chatrooms paginada.
     */
    public function index(GetChatroomsRequest $request)
    {
        $chatrooms = $this->chatroomsService->getAllChatrooms($request->query());
        //return  ChatroomAuthResource::collection($chatrooms);
        // dd($chatrooms);
        return ChatroomAuthResource::collection($chatrooms);


    }


    //Chatrooms de equipos
    public function getTeamsChatroom()
    {
        $chatrooms = $this->chatroomsService->getTeamsChatrooms();
        return  ChatroomAuthResource::collection($chatrooms);
    }

    public function getUserChatrooms(int $userId)
    {
        $user = User::find($userId);
        $chatrooms = $this->chatroomsService->getUserChatrooms($user);
        return ChatroomUserResource::collection($chatrooms);
    }


    public function store(PostChatroomUser $request)
    {
        $chatroom = $this->chatroomsService->createChatroom($request->all());
        return new ChatroomUserResource($chatroom);

    }

    public function show(chatroom $chatroom)
    {
        //
    }


    public function update($chatroomId, PutChatroomUser $request)
    {
        $chatroom = $this->chatroomsService->updateChatroom($chatroomId, $request->all());
        return new ChatroomUserResource($chatroom);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($chatroomId)
    {
        $chatroom = $this->chatroomsService->deleteChatroom($chatroomId);
        return new ChatroomUserResource($chatroom);
    }
}
