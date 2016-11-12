<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Auth;

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
        $user = Auth::user();

        return view('project.list', [
            'team' => $team,
            'user' => $user,
            'projects' => $projects,
        ]);
    }

    public function templates($slug, Request $request)
    {
        $team = Team::where('slug', $slug)->first();
        if (!$team) abort(404);

        $templates = $team->project_templates;
        $user = Auth::user();

        return view('template.list', [
            'team' => $team,
            'user' => $user,
            'templates' => $templates,
        ]);
    }

    public function manage($slug)
    {
        $team = Team::where('slug', $slug)->first();
        if (!$team) abort(404);

        $user = Auth::user();

        if (!($user->role->slug === 'admin')) {
            abort(403);
        }

        return view('team.manage', [
            'team' => $team,
            'user' => $user,
        ]);
    }
}
