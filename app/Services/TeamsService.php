<?php

namespace App\Services;

use App\Actions\Teams\GetTeamAction;
use App\Actions\Teams\JoinTeamAction;
use App\Actions\Teams\UpdateTeamRecruitingAction;

class TeamsService
{
    private JoinTeamAction $joinTeamAction;
    private UpdateTeamRecruitingAction $updateTeamRecruitingAction;
    private GetTeamAction $getTeamAction;
    public function __construct(JoinTeamAction $joinTeamAction, UpdateTeamRecruitingAction $updateTeamRecruitingAction, GetTeamAction $getTeamAction)
    {
        $this->joinTeamAction = $joinTeamAction;
        $this->updateTeamRecruitingAction = $updateTeamRecruitingAction;
        $this->getTeamAction = $getTeamAction;
    }


    public function joinTeam($team, $password)
    {
        return $this->joinTeamAction->execute($team, $password);
    }

    public function updateTeamRecruiting(array $data)
    {
        return $this->updateTeamRecruitingAction->execute($data);
    }
    public function getTeam($teamId)
    {
        return $this->getTeamAction->execute($teamId);
    }



}
