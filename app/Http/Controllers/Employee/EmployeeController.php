<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user ->email != $request->email){
            $validator = Validator::make($request->all(),[
                'email' => 'required|unique:users'
            ]);

            if($validator->fails()){
                alert()->warning('Email Address already exists');
                return redirect()->back();
            }
        }
        if($user ->email == $request->email )
        {
            if($request->password == $request->newpassword)
            {
                $user->update($request->all());
                alert()->success('Employee Updated Successfully');
            }
            else
            {
                alert()->warning('Password Not Matched','Re-Enter Password Please');
            }
       
            return redirect()->back();
        }
    }
}
