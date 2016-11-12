<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function show($slug)
    {
        $team = Team::where('slug', $slug)->first();
        if (!$team) abort(404);

        return redirect("/app/{$team->slug}/projects");
    }

    public function projects($slug)
    {
        $team = Team::where('slug', $slug)->first();
        if (!$team) abort(404);

        $projects = $team->projects;

        return view('project.list', [
            'team' => $team,
            'projects' => $projects,
        ]);
    }

    public function manage($slug)
    {
        $team = Team::where('slug', $slug)->first();
        if (!$team) abort(404);

        return view('team.manage', [
            'team' => $team,
        ]);
    }
}
