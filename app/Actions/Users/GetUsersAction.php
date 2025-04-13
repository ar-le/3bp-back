<?php

namespace App\Actions\Users;

use App\Models\User;

class GetUsersAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute($request)
    {
        return User::paginate(10);
    }
}
