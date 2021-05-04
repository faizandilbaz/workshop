<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
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
        $results = 0;
        $marks=0;
        $workshops = WorkShop::where('company_id',Auth::user()->company->id)->get();
        foreach($workshops as $workshop)
        {
            if($workshop->workshopemployee->count(1))
            {
                $option = Auth::user()->workshopemployee->where('work_shop_id',$workshop->id)->first();
                $marks = $option->status;
                $results = $results += $option->result;
            }
            
        } 
        return view('employee.workShope.today')->with('workshops',$workshops)->with('marks',$marks)->with('results',$results);
    }
    public function previous()
    {
        $marks = 0;
        $workshops = WorkShop::where('company_id',Auth::user()->company->id)->get();
        foreach($workshops as $workshop)
        {
            if(Auth::user()->workshopemployee->where('work_shop_id',$workshop->id)->first())
            {
                $option = Auth::user()->workshopemployee->where('work_shop_id',$workshop->id)->first();
                $marks = $marks += $option->result;
            }
        } 
        return view('employee.workShope.previous')->with('workshops',$workshops)->with('marks',$marks);
    }
    public function attend($id)
    {
        $workshop = WorkShop::find($id);
        return view('employee.workShope.attend')->with('workshop',$workshop);
    }    
    public function attended($id)
    {
        $workshop = WorkShop::find($id);
        $workshopemployee = WorkshopEmployee::create([
            'work_shop_id' => $workshop->id,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->back();
    }    
    
    public function test($id)
    {
        $workshop = WorkShop::find($id);
        $questions = Question::where('work_shop_id',$id)->get();
        return view('employee.workShope.test')->with('questions',$questions)->with('workshop',$workshop);

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
    public function resultstore(Request $request)
    {
        $mark = 0;
        $workshopemployee = WorkshopEmployee::where('user_id',Auth::user()->id)->where('work_shop_id',$request->workshop)->first();
        foreach($request->questions as $qId){
           $question = Question::find($qId);
            if($request->answer[$qId] == $question->option_id)
            {
                $mark = $mark += 1;
            }
        }
        $workshopemployee->update([
            'result' => $mark ,
            'status' => '0'           
        ]); 
        $challenge = Challenge::where('challenger_id',Auth::user()->id)->where('work_shop_id',$request->workshop)->first();
        if($challenge == '1')
        {
            $challenge->update([
                'result' => $mark ,
                'status' => 'Completed'           
            ]); 
        }
        return redirect()->route('employee.dashboard');
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
