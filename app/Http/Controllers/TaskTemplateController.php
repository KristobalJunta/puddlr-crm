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
        //
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $projectTemplate = ProjectTemplate::find($template);
        if (!$projectTemplate) abort(404);

        $roles = Role::all();

        return view('task-template.create', [
            'team' => $team,
            'projectTempate' => $projectTemplate,
            'roles' => $roles
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
            'time_expected' => $request->get('time'),
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
        //
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $projectTemplate = ProjectTemplate::find($template);
        if (!$projectTemplate) abort(404);

        $task = TaskTemplate::find($id);
        $roles = Role::all();

        $user = Auth::user();

        return view('task-template.edit', [
            'team' => $team,
            'projectTemplate' => $projectTemplate,
            'task' => $task,
            'roles' => $roles,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $team, $template, Request $request)
    {
        //
        $template = TaskTemplate::find($id);

        $template->name = $request->get('name');
        $template->description = $request->get('description');
        $template->time_expected = $request->get('time');
        $template->role_id = $request->get('role_id');

        $template->save();

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
