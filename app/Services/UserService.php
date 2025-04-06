<?php

namespace App\Services;

use App\Actions\CreateUser;
use App\Actions\Users\GetModCharactersAction;
use App\Actions\Users\GetProfileInfo;
use App\Actions\Users\GivePointsAction;
use Illuminate\Http\Request;

class UserService
{
    private CreateUser $createUser;
    private GetModCharactersAction $getModCharactersAction;
    private GetProfileInfo $getProfileInfo;
    private GivePointsAction $givePointsAction;

    public function __construct(CreateUser $createUser, GetModCharactersAction $getModCharactersAction, GetProfileInfo $getProfileInfo, GivePointsAction $givePointsAction)
    {
        $this->getProfileInfo = $getProfileInfo;
        $this->getModCharactersAction = $getModCharactersAction;
        $this->createUser = $createUser;
        $this->givePointsAction = $givePointsAction;
    }


    public function createUser(array $data)
    {
        return $this->createUser->execute($data);
    }

    public function getModCharacters()
    {
        return $this->getModCharactersAction->execute();
    }

    public function getProfileInfo($userId)
    {
        return $this->getProfileInfo->execute($userId);
    }

    public function givePoints($userId, $points)
    {
        return $this->givePointsAction->execute($userId, $points);
    }


}
