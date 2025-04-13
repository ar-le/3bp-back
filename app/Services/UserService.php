<?php

namespace App\Services;

use App\Actions\CreateUser;
use App\Actions\Users\CreateUserAdmin;
use App\Actions\Users\DeleteUser;
use App\Actions\Users\DeleteUserAction;
use App\Actions\Users\GetModCharactersAction;
use App\Actions\Users\GetProfileInfo;
use App\Actions\Users\GetUsersAction;
use App\Actions\Users\GivePointsAction;
use App\Actions\Users\UpdateUserAdminAction;
use Illuminate\Http\Request;

class UserService
{
    private CreateUser $createUser;
    private GetModCharactersAction $getModCharactersAction;
    private GetProfileInfo $getProfileInfo;
    private GivePointsAction $givePointsAction;
    private CreateUserAdmin $createUserAdmin;
    private GetUsersAction $getUsersAction;
    private UpdateUserAdminAction $updateUserAdminAction;
    private DeleteUserAction $deleteUserAction;

    public function __construct(CreateUser $createUser, GetModCharactersAction $getModCharactersAction, GetProfileInfo $getProfileInfo, GivePointsAction $givePointsAction, CreateUserAdmin $createUserAdmin, GetUsersAction $getUsersAction, UpdateUserAdminAction $updateUserAdminAction, DeleteUserAction $deleteUserAction)
    {
        $this->getProfileInfo = $getProfileInfo;
        $this->getModCharactersAction = $getModCharactersAction;
        $this->createUser = $createUser;
        $this->givePointsAction = $givePointsAction;
        $this->createUserAdmin = $createUserAdmin;
        $this->getUsersAction = $getUsersAction;
        $this->updateUserAdminAction = $updateUserAdminAction;
        $this->deleteUserAction = $deleteUserAction;
    }

    //registrar
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

    //Admin

    public function createUserAdmin(array $data)
    {
        return $this->createUserAdmin->execute($data);
    }

    public function getUsers(Request $data)
    {
        return $this->getUsersAction->execute($data);
    }

    public function updateUserAdmin(array $data)
    {
       return $this->updateUserAdminAction->execute($data['id'], $data);
    }

    public function deleteUser($id)
    {
        return $this->deleteUserAction->execute($id);
    }


}
