<?php

namespace App\Actions\Chatrooms;

use App\Models\Chatroom;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class GetAllChatrooms
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
        $chatrooms = Chatroom::doesntHave('team');
        if (Arr::exists($request, 'textFilter') && !empty($request['textFilter'])) {
            $chatrooms->where(function (Builder $query) use($request){
                $query->whereLike('name', '%'.$request["textFilter"].'%')->orWhereLike('description', '%'.$request["textFilter"].'%');
            });
        }

        if(Arr::exists($request, 'after') && !empty($request['after'])) $chatrooms->whereDate('created_at', '>', $request['after'] );
         $chatrooms->orderBy('created_at', 'desc');
        return $chatrooms->paginate(Arr::get($request, 'perPage', 5));
    }
}
