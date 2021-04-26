<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Result;
use App\Models\WorkShop;
use App\Models\WorkshopEmployee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = WorkShop::where('company_id',Auth::user()->company->id)->where('start','>',Carbon::now())->get();
        return view('employee.workShope.upcoming')->with('workshops',$workshops);
    }
    public function today()
    {
        $workshops = WorkShop::where('company_id',Auth::user()->company->id)->get();
        return view('employee.workShope.today')->with('workshops',$workshops);
    }
    public function attend($id)
    {
        $workshop = WorkShop::find($id);
        $workshopemployee = WorkshopEmployee::create([
            'workshop_id' => $workshop->id,
            'status' => '0',
            'user_id' => Auth::user()->id
        ]);
        return view('employee.workShope.attend')->with('workshop',$workshop);
    }    
    public function test($id)
    {
        $workshop = WorkShop::find($id);
        $questions = Question::where('workshop_id',$workshop->id)->get();
        foreach($questions as $question)
        {
            $result = Result::create([
                'workshop_id' => $workshop->id,
                'question_id' => $question->id,
                'user_id' => Auth::user()->id
            ]);
        }
        $results = Result::where('workshop_id',$workshop->id)->get();
        return view('employee.workShope.test')->with('workshop',$workshop)->with('results',$results);
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
