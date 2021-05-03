<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\WorkShop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $workshops = WorkShop::where('company_id',Auth::user()->company->id)->get();
      return view('team.dashboard.index')->with('workshops',$workshops);
    }
}
