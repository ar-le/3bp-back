<?php

namespace App\Services;

use App\Actions\Teams\JoinTeamAction;
use App\Actions\Teams\UpdateTeamRecruitingAction;

class TeamsService
{
    private JoinTeamAction $joinTeamAction;
    private UpdateTeamRecruitingAction $updateTeamRecruitingAction;
    public function __construct(JoinTeamAction $joinTeamAction, UpdateTeamRecruitingAction $updateTeamRecruitingAction)
    {
        $this->updateTeamRecruitingAction = $updateTeamRecruitingAction;
        $this->joinTeamAction = $joinTeamAction;
    }


    public function joinTeam($team, $password)
    {
        return $this->joinTeamAction->execute($team, $password);
    }

    public function updateTeamRecruiting(array $data)
    {
        return $this->updateTeamRecruitingAction->execute($data);
    }


}
