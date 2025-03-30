<?php

namespace App\Events;

use App\Models\Chatmessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

     private Chatmessage $chatmessage;
     private $chatroomId;
    public function __construct(Chatmessage $message, $chatroomId)
    {
        $this->chatmessage = $message;
        $this->chatroomId = $chatroomId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel("chatroom-$this->chatroomId")
        ];
    }


    public function broadcastAs(){
        return 'message';
    }


    public function broadcastWith()
    {
        $user = $this->chatmessage->user->first();
        return [
            'id' => $this->chatmessage->id,
            'content' => $this->chatmessage->content,
            'hidden' => $this->chatmessage->hidden,
            'creator' => [
                'id' => $user->id,
                'username' => $user->username,
            ]
       ];
    }
}
