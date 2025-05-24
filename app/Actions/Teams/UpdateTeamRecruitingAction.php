<?php

namespace App\Actions\Teams;

use App\Models\Team;

class UpdateTeamRecruitingAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute(array $data)
    {
        if($data['team'] == 'resistance') $teamId = 1;
        else $teamId = 2;
        $team = Team::findOrFail($teamId);
        $team->isRecruiting = $data['recruiting'];
        if (isset($data['password'])) {
            $team->password = $data['password'];
        }
        $team->save();

        return $team;
    }
}
