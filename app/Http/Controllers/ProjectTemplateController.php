<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\ProjectTempate;

class ProjectTemplateController extends Controller
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
    public function store($team, Request $request)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        ProjectTempate::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'team_id' => $team->id,
        ]);

        return redirect("/app/{$team->slug}/template/{$template->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($team, $id, Request $request)
    {
        $team = Team::where('slug', $team)->first();
        if (!$team) abort(404);

        $projectTempate = ProjectTempate::find($id);
        if (!$projectTempate) abort(404);

        return view('template.show', [
            'team' => $team,
            'temlate' => $projectTempate,
        ]);
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
