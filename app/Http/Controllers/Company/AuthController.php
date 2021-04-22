<?php

namespace App\Http\Controllers\Company;

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
        if(Auth::guard('company')->attempt($creds))
        {
            alert()->success('You Login Successfully');
            return redirect()->intended(route('company.dashboard'));
        } else {
            return redirect()->back();
        }
    }
    
    public function logout()
    {
        Auth::logout();
        alert()->success('You Logout Successfully');
        return redirect()->route('company.login');
    }
}
