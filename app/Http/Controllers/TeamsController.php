<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Services\TeamsService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TeamsController extends Controller
{
    private TeamsService $teamsService;

    public function __construct(TeamsService $teamsService){
        $this->teamsService = $teamsService;
    }

    public function joinTeam(Request $request)
    {
        $request->validate([
            'team' => 'required | in:resistance,escapists',
            'password' => 'required'
        ]);

        $message = $this->teamsService->joinTeam($request->team, $request->password);

        return response()->json($message);
    }
}
