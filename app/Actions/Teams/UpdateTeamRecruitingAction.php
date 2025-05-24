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
        
        $team = Team::findOrFail($data['team']);
        
        if (isset($data['password'])) {
            $team->password = $data['password'];
        }
        $team->save();

        return $team;
    }
}
