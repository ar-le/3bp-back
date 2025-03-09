<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = ['id'];
    public function users(){
        return $this->hasMany(User::class);
    }

    public function chatrooms(){
        return $this->hasOne(Chatroom::class);
    }
}
