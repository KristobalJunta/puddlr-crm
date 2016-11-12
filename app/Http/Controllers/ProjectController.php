<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectTemplate;
use App\TaskTemplate;
use App\Task;
use App\Status;
use App\Quota;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $template = ProjectTemplate::find($request->get('project_template_id'));
        $status = Status::where('name', 'Not started')->first();

        $project = Project::create([
            'name' => $request->get('name'),
            'slug' => str_slug($request->get('name')),
            'description' => $request->get('description', ''),
            'project_template_id' => $template->id,
        ]);

        foreach($request->get('quotas') as $user_id => $time) {
            $time = ceil(floatval($time) * 3600);
            Quota::create([
                'project_id' => $project->id,
                'user_id' => $user_id,
                'time' => $time,
            ]);
        }

        foreach ($template->task_templates as $taskTemplate) {
            $task = Task::create([
                'name' => $taskTemplate->name,
                'description' => $taskTemplate->description,
                'time_expected' => $taskTemplate->time_expected,
                'status_id' => $status->id,
                'project_id' => $project->id,
                'task_template_id' => $taskTemplate->id,
            ]);

            dump($task->toArray());

            $users = $project->project_template->team->users()
                        ->where('role_id', $taskTemplate->role_id)
                        ->orderBy('priority')
                        ->get()
                        ->filter(function ($user) use ($project) {
                            return $user->quotas()
                                    ->where('project_id', $project->id)
                                    ->first()->time > 0;
                        });

            dump($users->toArray());

            foreach ($users as $user) {
                $quota = $user->quotas()->where('project_id', $project->id)->first();

                if ($quota->time < $task->time_expected) continue;

                $quota->time = $quota->time - $task->time_expected;
                $quota->save();
                $task->user_id = $user->id;
                $task->save();


                dump($quota->toArray());
                dump($user->toArray());

                break;
            }
        }

        dd($project->tasks->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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