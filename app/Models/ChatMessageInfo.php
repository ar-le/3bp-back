<?php

namespace App\Models;

use GuzzleHttp\Psr7\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ChatMessageInfo extends Pivot
{
    use HasFactory;
    public $incrementing = true;
    protected $table = 'chatmessage_chatroom_user';
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function chatroom() {
        return $this->belongsTo(Chatroom::class);
    }

    public function chatmessage() {
        return $this->belongsTo(Chatmessage::class);
    }
}
