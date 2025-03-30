<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatMessageInfoCompleteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => new ChatmessageResource($this->chatmessage),
            'user' => new UserBasicResource($this->user),
            'chatroom' => new ChatroomAuthResource($this->chatroom),
        ];
    }
}
