<?php

namespace App\Actions\Users;

use App\Models\User;

class DeleteUserAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }
}
