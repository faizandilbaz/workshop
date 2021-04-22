<?php

namespace App\Http\Controllers;

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
       
        if (Auth::guard('admin')->attempt($cred)) {  
            // dd($request);
            return redirect()->route('admin.dashboard');
        } 
        elseif(Auth::guard('company')->attempt($cred)){
            return redirect()->route('company.dashboard');
        }
        elseif(Auth::guard('team')->attempt($cred)){
            // dd($request);
            return redirect()->route('team.dashboard');
        }
          elseif(Auth::guard('user')->attempt($cred)){
            return redirect()->route('user.dashboard');
        }
      
        else {
           
            alert()->warning('Login attempt Failed', 'check credentials');
             return redirect()->back()->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('/');
    }


}
