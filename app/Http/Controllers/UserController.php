<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserPointsRequest;
use App\Http\Requests\GetUserRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\NewPointsUserResource;
use App\Http\Resources\UserBasicResource;
use App\Http\Resources\UserProfileResource;
use App\Http\Resources\UserResource;
use App\Models\User;
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

    public function createUserAdmin(RegisterRequest $request)
    {
        $user = $this->userService->createUserAdmin($request->all());
        return new UserResource($user);
    }

    public function getUsers(Request $request)
    {
        $users = $this->userService->getUsers($request);
        return UserResource::collection($users);
    }

    public function get($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    public function updateUserAdmin(UpdateUserRequest $request)
    {
        $user = $this->userService->updateUserAdmin($request->all());
        return new UserResource($user);
    }

    public function destroy($id)
    {
       $user =  $this->userService->deleteUser($id);
        return new UserResource($user);
    }
}
