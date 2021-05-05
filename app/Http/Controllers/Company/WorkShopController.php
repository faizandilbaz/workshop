<?php

namespace App\Http\Controllers\Company;

use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use App\Models\WorkShop;
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
        return view('company.workShop.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.workShop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if((Carbon::now()->lte(Carbon::parse($request->start))) && ((Carbon::parse($request->start))->lt(Carbon::parse($request->end))) 
        && ((Carbon::parse($request->end))->lt(Carbon::parse($request->paper_end_time))))
        {
            $workShop = WorkShop::create($request->all());
            foreach ($request->questions as $qkey => $question) {
                $question = Question::create([
                    'work_shop_id' => $workShop->id,
                    'statement' => $question
                ]);;
                foreach ($request->options[$qkey] as $okey => $option) {
                    $optionN = Option::create([
                        'question_id' => $question->id,
                        'option' => $option
                    ]);
                    if ($request->correct[$qkey] == $okey+1) {
                        $question->update([
                            'option_id' => $optionN->id
                        ]);
                    }
                }
            }
            MailHelper::workshop(Auth::user());
            alert()->success('Workshop Stored Successfully');
            return redirect()->back();
        }
        else{
            alert()->warning('Time Adjustment Issue','Kindly Put Time Rightly');
            return redirect()->back()->withInput();
        }
     
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
        $workshop = WorkShop::find($id);
        return view('company.workShop.edit', compact('workshop'));
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
        $workshop = WorkShop::find($id);
        if((Carbon::now()->lte(Carbon::parse($request->start))) && ((Carbon::parse($request->start))->lt(Carbon::parse($request->end))) 
        && ((Carbon::parse($request->end))->lt(Carbon::parse($request->paper_end_time))))
        {
            if(Carbon::now() > Carbon::parse($workshop->start)){
                alert()->warning('Workshop has stated cannot update');
                return redirect()->back()->withInput();
            }
            else{
                $workshop->update($request->all());
                alert()->success('Workshop Updated Successfully');
                return redirect()->back();
            }
          
        }
        else{
            alert()->warning('Time Adjustment Issue','Kindly Put Time Rightly');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workshop = WorkShop::find($id);
        $workshop->delete();
        alert()->success('Workshop Deleted Successfully');
        return redirect()->back();
    }
}
