<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'username' => $this->username,
            'avatar' => $this->avatar ? asset($this->avatar) : null,
            'team' => TeamResource::make($this->team),
            'role' => $this->role,
            'email' => $this->email,
            'points' => $this->points,
            'accepts_cookies' => $this->accepts_cookies,
            'accepts_communication' => $this->accepts_communication
        ];
    }
}
