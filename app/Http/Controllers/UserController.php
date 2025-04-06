<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserPointsRequest;
use App\Http\Requests\GetUserRequest;
use App\Http\Resources\NewPointsUserResource;
use App\Http\Resources\UserBasicResource;
use App\Http\Resources\UserProfileResource;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController
{
    private UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getModCharacters()
    {

        $characters = $this->userService->getModCharacters();

        return UserBasicResource::collection($characters);
    }

    public function getProfileInfo(GetUserRequest $request)
    {
        $user = $this->userService->getProfileInfo($request->id);

        return UserProfileResource::make($user);
    }

    public function givePoints(AddUserPointsRequest $request)
    {
        $user = $this->userService->givePoints($request->user, $request->points);
        return UserProfileResource::make($user);
    }
}
