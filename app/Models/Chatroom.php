<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    /** @use HasFactory<\Database\Factories\ChatroomFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function chatMessages(){
        return $this->belongsToMany(ChatMessage::class, 'chatmessage_chatroom_user')->using(ChatMessageInfo::class);
    }

    public function lastChatMessages($firstPostId = null){
        $numberOfResults = 20;
        if($firstPostId == null) return $this->chatMessages()->orderBy('created_at', 'desc')->take($numberOfResults);
        return $this->chatMessages()->where('id', '<', $firstPostId)->orderBy('created_at', 'desc')->take($numberOfResults);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'chatmessage_chatroom_user')->using(ChatMessageInfo::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }
}
