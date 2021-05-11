<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Employeenote;
use Illuminate\Http\Request;

class EmployeenoteController extends Controller
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
        $employeenote =  Employeenote::create($request->all());
        alert()->success('Message Send Successfully');
        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employeenote  $employeenote
     * @return \Illuminate\Http\Response
     */
    public function show(Employeenote $employeenote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employeenote  $employeenote
     * @return \Illuminate\Http\Response
     */
    public function edit(Employeenote $employeenote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employeenote  $employeenote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $employeenote = Employeenote::find($id);
        $employeenote->update($request->all());
        alert()->success('Reply Send Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employeenote  $employeenote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeenote = Employeenote::find($id);
        $employeenote->delete();
        alert()->success('Message Deleted Successfully');
        return redirect()->back();
    }
}
