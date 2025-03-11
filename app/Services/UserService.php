<?php

namespace App\Services;

use App\Actions\CreateUser;
use Illuminate\Http\Request;

class UserService
{
    private CreateUser $createUser;
    public function __construct(CreateUser $createUser)
    {
        $this->createUser = $createUser;
    }

    public function createUser(array $data)
    {
        return $this->createUser->execute($data);
    }
}
