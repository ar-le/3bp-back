<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserBasicResource;
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
}
