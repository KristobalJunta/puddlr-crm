<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskTemplate;
use App\Team;
use App\Role;
use Auth;
use App\ProjectTemplate;

class TaskTemplateController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($team, $template)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $projectTemplate = ProjectTemplate::find($template);
        if (!$projectTemplate) abort(404);

        $roles = Role::all()->filter(function ($role) {
            return !($role->slug === 'admin');
        });

        $user = Auth::user();

        return view('task-template.create', [
            'team' => $team,
            'projectTemplate' => $projectTemplate,
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($team, $template, Request $request)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $projectTemplate = ProjectTemplate::find($template);
        if (!$projectTemplate) abort(404);

        TaskTemplate::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'time_expected' => intval($request->get('time') * 3600),
            'role_id' => $request->get('role_id'),
            'project_template_id' => $projectTemplate->id,
        ]);

        return redirect("/app/{$team->slug}/template/{$projectTemplate->id}");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($team, $template, $id)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $projectTemplate = ProjectTemplate::find($template);
        if (!$projectTemplate) abort(404);

        $task = TaskTemplate::find($id);
        $roles = Role::all()->filter(function ($role) {
            return !($role->slug === 'admin');
        });

        $user = Auth::user();

        return view('task-template.edit', [
            'team' => $team,
            'projectTemplate' => $projectTemplate,
            'task' => $task,
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($team, $template, $id, Request $request)
    {
        $team = Team::where('slug', $team)->first();
        $template = ProjectTemplate::find($template);
        $taskTemplate = TaskTemplate::find($id);

        $taskTemplate->name = $request->get('name');
        $taskTemplate->description = $request->get('description');
        $taskTemplate->time_expected = intval($request->get('time') * 3600);
        $taskTemplate->role_id = $request->get('role_id');

        $taskTemplate->save();

        return redirect("/app/{$team->slug}/template/{$template->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
