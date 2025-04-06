<?php

namespace App\Actions\Users;

use App\Models\User;

class GivePointsAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute($userId, $points)
    {
        $user = User::findOrFail($userId);
        $user->points = $user->points + $points;
        $user->save();
        return $user;
    }
}
