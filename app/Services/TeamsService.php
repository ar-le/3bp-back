<?php

namespace App\Services;

use App\Actions\Teams\JoinTeamAction;

class TeamsService
{
    private JoinTeamAction $joinTeamAction;
    public function __construct(JoinTeamAction $joinTeamAction)
    {
        $this->joinTeamAction = $joinTeamAction;

    }

    public function joinTeam($team, $password)
    {
        return $this->joinTeamAction->execute($team, $password);
    }
}
