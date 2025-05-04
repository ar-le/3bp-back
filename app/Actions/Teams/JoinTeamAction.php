<?php

namespace App\Actions\Teams;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class JoinTeamAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute ($team, $password)
    {
        if($team == 'resistance') $teamId = 1;
        else $teamId = 2;
        //comprobar si el equipo está reclutando, si el usuario pertenece ya a un equipo, y si la contrañesa es correcta
        $team = Team::findOrFail($teamId);
        if(!$team->isRecruiting) return ['msg' => 'Not recruiting'];
        if($team->password != $password) return ['msg' => 'Incorrect password'];
        $user = Auth::user();
        if($user->team_id != null) return ['msg' => 'Already in a team'];

        //Si todo ok asignar el equipo
        $user->team_id = $teamId;
        $user->save();
        return ['msg' => 'Joined', 'team'];
    }
}
