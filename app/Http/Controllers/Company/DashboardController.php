<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\WorkShop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $today = WorkShop::where('company_id',Auth::user()->id)->whereDate('start',Carbon::today())->get();
        $upcoming = WorkShop::where('company_id',Auth::user()->id)->whereDate('start','>',Carbon::today())->get();
        return view('company.dashboard.index')->with('today',$today)->with('upcoming',$upcoming);
    }
}
