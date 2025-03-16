<?php

namespace App\Actions\Chatrooms;

use App\Models\Chatroom;
use Illuminate\Support\Arr;

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
            'creator_id' => $request['creator_id'],
            'team_id' => Arr::exists($request, 'team_id') ? $request['team_id'] : null
        ]);
    }
}
