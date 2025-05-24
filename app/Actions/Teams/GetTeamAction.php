<?php

namespace App\Actions\Teams;

use App\Models\Team;

class GetTeamAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function execute($teamId)
    {
        return Team::findOrFail($teamId);
    }
}
