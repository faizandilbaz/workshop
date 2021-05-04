<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.team.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:teams'
        ]);

        if($validator->fails()){
            alert()->warning('Email Address already exists');
            return redirect()->back();
        }
        $validators = Validator::make($request->all(),[
            'name' => 'required|unique:teams'
        ]);

        if($validators->fails()){
            alert()->warning('Team Name already exists');
            return redirect()->back();
        }
        Team::create($request->all());
        alert()->success('Team Added Successfully', 'Team Added Successfully');
        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $team = Team::find($id);
        if($team ->email == $request->email && $team ->name == $request->name)
        {
            if($request->password == $request->newpassword)
            {
                $team->update($request->all());
                alert()->success('team Updated Successfully');
            }
            else
            {
                alert()->warning('Password Not Matched','Re-Enter Password Please');
                // alert()->success('Password Not Matched,Re-Enter Password Please');
            }
            return redirect()->back();

        }
        if($team ->email != $request->email){
            $validator = Validator::make($request->all(),[
                'email' => 'required|unique:companies'
            ]);
    
            if($validator->fails()){
                alert()->warning('Email Address  already exists');
                return redirect()->back();
            }
            if($request->password == $request->newpassword)
            {
                $team->update($request->all());
                alert()->success('team Updated Successfully');
            }
            else
            {
                alert()->warning('Password Not Matched','Re-Enter Password Please');
                // alert()->success('Password Not Matched,Re-Enter Password Please');
            }
            return redirect()->back();
        }
        if($team ->name != $request->name)
        {

            $validators = Validator::make($request->all(),[
                'name' => 'required|unique:companies'
            ]);
            if($validators->fails()){
                alert()->warning('team Name already exists');
                return redirect()->back();
            }
            if($request->password == $request->newpassword)
            {
                $team->update($request->all());
                alert()->success('team Updated Successfully');
            }
            else
            {
                alert()->warning('Password Not Matched','Re-Enter Password Please');
                // alert()->success('Password Not Matched,Re-Enter Password Please');
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        alert()->success('Team Deleted Successfully');
        return redirect()->back();
    }
}
