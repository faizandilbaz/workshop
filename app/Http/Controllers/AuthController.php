<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
// dd($request);

        $cred = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $admin = Admin::where('email',$request->email)->first();
        $team = Team::where('email',$request->email)->first();
        $company = Company::where('email',$request->email)->first();
        $user = User::where('email',$request->email)->first();
        if (Auth::guard('admin')->attempt($cred)) {  

            return redirect()->route('admin.dashboard');
        } 
        elseif(Auth::guard('company')->attempt($cred)){
            // dd($request);
            return redirect()->route('company.dashboard');
        }
        elseif(Auth::guard('team')->attempt($cred)){
            
            return redirect()->route('team.dashboard');
        }
          elseif(Auth::guard('user')->attempt($cred)){
            return redirect()->route('employee.dashboard');
        }
        elseif( !$admin && !$team && !$company && !$user )
        {
            alert()->warning('Please register your account');
            return redirect()->back()->withInput();
        }
        else {
            alert()->warning('Password Wrong', 'Check Credentials');
             return redirect()->back()->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }


}
