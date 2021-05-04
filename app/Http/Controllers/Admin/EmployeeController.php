<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.employee.create');
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
            'email' => 'required|unique:users'
        ]);
        if($validator->fails()){
            alert()->warning('Email Address already exists');
            return redirect()->route('admin.employee.index');
        }
        User::create($request->all());
        alert()->success('User Added Successfully');
        return redirect()->route('admin.employee.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('admin.employee.create',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.employee.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        if($user ->email != $request->email){
            $validator = Validator::make($request->all(),[
                'email' => 'required|unique:users'
            ]);

            if($validator->fails()){
                alert()->warning('Email Address already exists');
                return redirect()->back();
            }
        }
        if($user ->email == $request->email )
        {
            if($request->password == $request->newpassword)
            {
                $user->update($request->all());
                alert()->success('Employee Updated Successfully');
            }
            else
            {
                alert()->warning('Password Not Matched','Re-Enter Password Please');
            }
       
            return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        alert()->success('Employee User Deleted Successfully');
        return redirect()->back();
    }
    public function getTeamsByCompany(Request $request)
    {
        $company = Company::find($request->company);
        return view('admin.employee.create',compact('company'));
    }
}
