<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserBasicResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController
{
    public function getModCharacters()
    {
        $user = Auth::user();
        $characters = $user->characters->get();

        return UserBasicResource::collection($characters);
    }
}
