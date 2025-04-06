<?php

namespace App\Actions\Users;

use App\Http\Resources\UserProfileResource;
use App\Models\User;

class GetProfileInfo
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute($userId)
    {
        $user = User::with(['team', 'recruitingTeam'])->findOrFail($userId);
        return $user;
    }
}
