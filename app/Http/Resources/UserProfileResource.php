<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $joined = Carbon::create($this->created_at);
        return [
            'id' => $this->id,
            'username' => $this->username,
            'avatar' => $this->avatar ? asset($this->avatar) : null,
            'totalMessages' => $this->totalMessages(),
            'mostUsedChats' => ChatroomUserResource::collection($this->mostUsedChatrooms()),
            'joined' => $joined->format('d-m-Y'),
            $this->mergeWhen(in_array($request->user()->role, ['admin', 'mod']), [
                'team' => new TeamResource($this->team),
                'points' => $this->points,
                'recruitingTeam' => new TeamResource($this->recruitingTeam),
            ]),
        ];
    }
}
