<?php

namespace App\Actions\Chatrooms;

use App\Models\Chatroom;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CreateChatroomAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute(array $request)
    {
       return Chatroom::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'creator_id' => Auth::user()->id,
            'team_id' => Arr::exists($request, 'team_id') ? $request['team_id'] : null
        ]);
    }
}
