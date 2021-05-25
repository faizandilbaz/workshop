<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('team.project.show',compact('project'));   
    }
    public function accepted($id)
    {
        $project = Project::find($id);
        $project->update([
            'status' => 'Accepted'
        ]);
        alert()->success('Project Accepted Successfully');
        return redirect()->back();
    }
    public function decline($id)
    {
        $project = Project::find($id);
        $project->update([
            'status' => 'Decline'
        ]);
        alert()->success('Project Offer Decline Successfully');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $project = Project::find($id);
        $project->update([
            'note' => $request->note,
            'status' => "Completed"
        ]);
        alert()->success('Project Mark Completed Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    public function check(Request $request)
    {
        if((Carbon::parse($request->deadline))<=(Carbon::parse($request->date)) || $request->date<=Carbon::now()){
            return response()->json(1);
        }
        else{
            return response()->json(0);          
        }
       
    }
}
