<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    /** @use HasFactory<\Database\Factories\ChatroomFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function chatmessages(){
        return $this->belongsToMany(Chatmessage::class, 'chatmessage_chatroom_user')->using(ChatMessageInfo::class);
    }

    public function lastChatMessagesComplete($startingPostId = null){
        $numberOfResults = 20;
        if($startingPostId == null) return $this->chatMessages()->orderBy('created_at', 'desc')->take($numberOfResults);
        return $this->chatMessages()->where('id', '<', $startingPostId)->orderBy('created_at', 'desc')->take($numberOfResults);
    }

    public function lastChatMessagesPublic($startingPostId = null){
        //censurar los ocultos y censurados
        $numberOfResults = 20;
        if($startingPostId == null) return $this->chatMessages()->orderBy('created_at', 'desc')->take($numberOfResults);
        return $this->chatMessages()->where('id', '<', $startingPostId)->orderBy('created_at', 'desc')->take($numberOfResults);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'chatmessage_chatroom_user')->using(ChatMessageInfo::class);
    }

    public function favoriteOfUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function creator(){
        return $this->belongsTo(User::class, 'creator_id');
    }
}
