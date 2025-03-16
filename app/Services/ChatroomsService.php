<?php

namespace App\Services;

use App\Actions\Chatrooms\GetAllChatrooms;
use App\Actions\Chatrooms\GetTeamsChatrooms;
use App\Actions\Chatrooms\GetUserChatrooms;
use App\Models\User;

class ChatroomsService
{
    /**
     * Create a new class instance.
     */
    private GetAllChatrooms $getAllChatroomsAction;
    private GetTeamsChatrooms $getTeamsChatroomsAction;
    private GetUserChatrooms $getUserChatroomsAction;

    public function __construct(
        GetAllChatrooms $getAllChatrooms,
        GetTeamsChatrooms $getTeamsChatrooms,
        GetUserChatrooms $getUserChatrooms

        )
    {
        $this->getAllChatroomsAction = $getAllChatrooms;
        $this->getTeamsChatroomsAction = $getTeamsChatrooms;
        $this->getUserChatroomsAction = $getUserChatrooms;
    }

    public function getAllChatrooms(array $request)
    {
        return $this->getAllChatroomsAction->execute($request);
    }

    public function getTeamsChatrooms()
    {
        return $this->getTeamsChatroomsAction->execute();
    }

    public function getUserChatrooms(User $user)
    {
        return $this->getUserChatroomsAction->execute($user);
    }
}
