<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $creds = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('team')->attempt($creds))
        {
            alert()->success('You Login Successfully');
            return redirect()->intended(route('team.dashboard'));
        } else {
            return redirect()->back();
        }
    }
    
    public function logout()
    {
        Auth::logout();
        alert()->success('You Logout Successfully');
        return redirect()->route('team.login');
    }
}
