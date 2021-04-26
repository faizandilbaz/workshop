<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use App\Models\WorkShop;
use Illuminate\Http\Request;

class WorkShopController extends Controller
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
        $workShop = WorkShop::create($request->all());
        foreach($request->questions as $qkey=>$question){
           $question = Question::create([
                'workshop_id' => $workShop->id,
                'statement' => $question
            ]);;
            foreach($request->options[$qkey] as $okey=>$option){
                $option = Option::create([
                    'question_id' => $question->id,
                    'option' => $option
                ]);
                foreach($request->correct as $ckey=>$crt){
                    if($okey == $crt){
                        $question->update([
                            'option_id' => $option->id
                        ]);
                    }
                }
            }
        }
        return redirect()->back();

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
