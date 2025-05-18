<?php

namespace App\Events;

use App\Http\Resources\TransmissionUserResource;
use App\Models\Transmission;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewTransmission implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    private Transmission $transmission;
    public function __construct(Transmission $transmission)
    {
        $this->transmission = $transmission;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('transmissions-channel'),
        ];
    }

    public function broadcastAs()
    {
        return 'transmission';
    }

    public function broadcastWith()
    {
        return [
            'title' => $this->transmission->title,
            'type' => $this->transmission->type,
            'content' => $this->transmission->content,
            'date' => $this->transmission->created_at
        ];
    }


}
