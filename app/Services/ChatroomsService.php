<?php

namespace App\Services;

use App\Actions\Chatrooms\CreateChatroomAction;
use App\Actions\Chatrooms\DeleteChatroomAction;
use App\Actions\Chatrooms\GetAllChatrooms;
use App\Actions\Chatrooms\GetChatroomsUserAction;
use App\Actions\Chatrooms\GetTeamsChatrooms;
use App\Actions\Chatrooms\GetUserChatrooms;
use App\Actions\Chatrooms\GetUserTeamChatroomAction;
use App\Actions\Chatrooms\UpdateChatroomAction;
use App\Models\Chatroom;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ChatroomsService
{
    /**
     * Create a new class instance.
     */
    private GetAllChatrooms $getAllChatroomsAction;
    private GetTeamsChatrooms $getTeamsChatroomsAction;
    private GetUserChatrooms $getUserChatroomsAction;
    private CreateChatroomAction $createChatroomAction;
    private UpdateChatroomAction $updateChatroomAction;
    private DeleteChatroomAction $deleteChatroomAction;
    private GetUserTeamChatroomAction $getUserTeamChatroomAction;
    private GetChatroomsUserAction $getChatroomsUserAction;

    public function __construct(
        GetAllChatrooms $getAllChatrooms,
        GetTeamsChatrooms $getTeamsChatrooms,
        GetUserChatrooms $getUserChatrooms,
        CreateChatroomAction $createChatroomAction,
        UpdateChatroomAction $updateChatroomAction,
        DeleteChatroomAction $deleteChatroomAction,
        GetUserTeamChatroomAction $getUserTeamChatroomAction,
        GetChatroomsUserAction $getChatroomsUserAction

        )
    {
        $this->getAllChatroomsAction = $getAllChatrooms;
        $this->getTeamsChatroomsAction = $getTeamsChatrooms;
        $this->getUserChatroomsAction = $getUserChatrooms;
        $this->createChatroomAction = $createChatroomAction;
        $this->updateChatroomAction = $updateChatroomAction;
        $this->deleteChatroomAction = $deleteChatroomAction;
        $this->getUserTeamChatroomAction = $getUserTeamChatroomAction;
        $this->getChatroomsUserAction = $getChatroomsUserAction;
    }

    public function getAllChatrooms(array $request)
    {
        return $this->getAllChatroomsAction->execute($request);
    }

    public function getTeamsChatrooms()
    {
        return $this->getTeamsChatroomsAction->execute();
    }

    public function getUserChatrooms(User $user): Collection
    {
        return $this->getUserChatroomsAction->execute($user);
    }

    public function createChatroom(array $request): Chatroom
    {
        return $this->createChatroomAction->execute($request);
    }

    public function updateChatroom( array $request): Chatroom
    {
        return $this->updateChatroomAction->execute($request);
    }

    public function deleteChatroom (int $id)
    {
        return $this->deleteChatroomAction->execute($id);
    }

    public function getUserTeamsChatrooms(User $user)
    {
        return $this->getUserTeamChatroomAction->execute($user);
    }


}
