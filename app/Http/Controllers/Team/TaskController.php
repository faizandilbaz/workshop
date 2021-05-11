<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
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
        // dd($request->employee_id);
        
        $project =  Project::where('id',$request->project_id)->first();
        $point = $project->dpoints - $request->points;
        if(Carbon::parse($request->deadline)->gte(Carbon::parse($project->deadline)))
        {
            alert()->warning('Deadline Date and Time is more than Project Dealine');
            return redirect()->back(); 
        }
        if($point >= 0)
        {
            $project->update([
                'dpoints' => $project->dpoints - $request->points
            ]);
        }
        else
        {
            alert()->warning('No More Points in your Project Accounts');
            return redirect()->back(); 
        }
        $task =  Task::create($request->all());
        alert()->success('Task Assigned To Successfully');
        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('team.task.show',compact('task'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $project =  Project::where('id',$task->project_id)->first();
        $project->update([
            'dpoints' => $project->dpoints + $task->points
        ]);        
        $task->delete();
        alert()->success('Task Deleted Successfully');
        return redirect()->back();
    }
    public function points(Request $request,$id)
    {
        $task = Task::find($id);
        $user = User::where('id',$task->employee->id)->first();
        $user->update([
            'points' => $request->getpoints + $user->points
        ]);
        $task->update([
            'getpoints' => $request->getpoints
        ]);       
        alert()->success('Points Assigned To Employee Successfully');
        return redirect()->back();
    }
}
