<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskTemplate;
use App\Task;
use App\Team;
use App\Role;
use App\Status;
use Auth;
use App\ProjectTemplate;
use App\Project;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($team, $project)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $project = Project::where('slug', $project)->first();
        if (!$project) abort(404);

        $roles = Role::all()->filter(function ($role) {
            return !($role->slug === 'admin');
        });

        $user = Auth::user();

        $users = $team->users->filter(function ($user) {
            return !$user->admin;
        });

        return view('task.create', [
            'team' => $team,
            'project' => $project,
            'roles' => $roles,
            'user' => $user,
            'users' => $users,
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($team, $project, Request $request)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $project = Project::where('slug', $project)->first();
        if (!$project) abort(404);

        Task::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'time_expected' => intval($request->get('time') * 3600),
            'user_id' => $request->get('user_id'),
            'project_id' => $project->id,
        ]);

        return redirect("/app/{$team->slug}/project/{$project->slug}");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($team, $project, $id)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $project = Project::where('slug', $project)->first();
        if (!$project) abort(404);

        $task = Task::find($id);
        $roles = Role::all()->filter(function ($role) {
            return !($role->slug === 'admin');
        });

        $user = Auth::user();
        $users = $team->users->filter(function ($user) {
            return !$user->admin;
        });

        return view('task.edit', [
            'team' => $team,
            'project' => $project,
            'task' => $task,
            'roles' => $roles,
            'user' => $user,
            'users' => $users,
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($team, $project, $id, Request $request)
    {
        $team = Team::where('slug', $team)->first();
        $project = Project::where('slug', $project)->first();
        $task = Task::find($id);

        $task->name = $request->get('name');
        $task->description = $request->get('description');
        $task->time_expected = intval($request->get('time') * 3600);
        $task->user_id = $request->get('user_id');

        $task->save();

        // dd($project);

        return redirect("/app/{$team->slug}/project/{$project->slug}");
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

    public function updateTime(Request $request)
    {
        $task = Task::find($request->get('id'));
        if (!$task) abort(404);
        $task->time_actual = $request->get('time_actual');
        $task->save();
        return response()->json([
            'status' => 'ok'
        ]);
    }
}
