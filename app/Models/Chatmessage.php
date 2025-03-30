<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatmessage extends Model
{
    use HasFactory;
    protected $guarded = [];
   // protected $fillable = ['content', 'mod_id', 'hidden', 'censored',];
    public function user(){
        return $this->belongsToMany(User::class, 'chatmessage_chatroom_user')->using(ChatMessageInfo::class);
    }


    public function chatroom(){
        return $this->belongsToMany(Chatroom::class, 'chatmessage_chatroom_user')->using(ChatMessageInfo::class);
    }

    //obtener mod que envió el mensaje utilizando un personaje
    public function mod(){
        return $this->belongsTo(User::class, 'mod_id');
    }

}
