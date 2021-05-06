<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\WorkShop;
use App\Models\WorkshopEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = WorkShop::where('company_id',Auth::user()->company->id)->get();
        return view('employee.challenge.index')->with('workshops',$workshops);
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
    public function stores($id)
    {
        $workshopemployee = WorkshopEmployee::find($id);
        $challenge = Challenge::create([
            'work_shop_id' => $workshopemployee->workshop->id,
            'user_id' => $workshopemployee->employee->id,
            'work_shop_employee_id' => $workshopemployee->id,
            'challenger_id' => Auth::user()->id
        ]);
        alert()->success('Challenge Created Successfully');
        return redirect()->route('employee.workshop.test',$workshopemployee->workshop->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workshop = WorkShop::find($id);
        $workshopemployees = WorkshopEmployee::orderBy('result','DESC')->where('work_shop_id',$workshop->id)->where('status',0)->get();
        $challenge = Challenge::where('challenger_id',Auth::user()->id)->first();
        return view('employee.challenge.show')->with('workshopemployees',$workshopemployees)->with('workshop',$workshop)->with('challenge',$challenge);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(Challenge $challenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Challenge $challenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challenge $challenge)
    {
        //
    }
}
