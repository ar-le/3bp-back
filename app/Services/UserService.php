<?php

namespace App\Services;

use App\Actions\CreateUser;
use App\Actions\Users\GetModCharactersAction;
use Illuminate\Http\Request;

class UserService
{
    private CreateUser $createUser;
    private GetModCharactersAction $getModCharactersAction;
    public function __construct(CreateUser $createUser, GetModCharactersAction $getModCharactersAction)
    {
        $this->getModCharactersAction = $getModCharactersAction;
        $this->createUser = $createUser;
    }

    public function createUser(array $data)
    {
        return $this->createUser->execute($data);
    }

    public function getModCharacters()
    {
        return $this->getModCharactersAction->execute();
    }
}
