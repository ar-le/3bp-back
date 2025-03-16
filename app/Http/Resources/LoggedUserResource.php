<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoggedUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'username' => $this->username,
            'avatar' => $this->avatar ? asset($this->avatar) : null,
            'team' => $this->team_id,
            'role' => $this->role,
            'token' => $this->createToken('auth_token')->plainTextToken

        ];
    }
}
