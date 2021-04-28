<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\WorkShop;
use App\Models\WorkshopEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RankController extends Controller
{
    public function index()
    {
        $workshops = WorkShop::where('company_id',Auth::user()->company->id)->get();
        return view('employee.rank.index')->with('workshops',$workshops);
    }
    public function show($id)
    {
        $workshop = WorkShop::find($id);
        $workshopemployees = WorkshopEmployee::orderBy('result','DESC')->where('work_shop_id',$workshop->id)->where('status',0)->get();
        return view('employee.rank.show')->with('workshopemployees',$workshopemployees)->with('workshop',$workshop);
    }   
}
