<?php

namespace App\Actions\Users;

use Illuminate\Support\Facades\Auth;

class GetModCharactersAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute()
    {
        $user = Auth::user();
        $characters = $user->characters;
        return $characters;
    }
}
