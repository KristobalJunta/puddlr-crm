<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskTemplate;
use App\Team;
use App\ProjectTempate;

class TaskTemplateController extends Controller
{
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
    public function store($team, $template, Request $request)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $projectTempate = ProjectTempate::find($template);
        if (!$projectTempate) abort(404);

        TaskTemplate::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'time_expected' => $request->get('time'),
            'role_id' => $request->get('role_id'),
            'project_template_id' => $projectTempate->id,
        ]);

        return redirect("/app/{$team->slug}/template/{$projectTempate->id}");
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
