<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatroomUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'description' => $this->description,
            'creator' => [
               'id' => $this->creator_id,
               'username' => $this->creator->username
            ],
            'team_id' => $this->team_id
        ];
    }
}
