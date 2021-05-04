<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        if($team ->email == $request->email && $team ->name == $request->name)
        {
            if($request->password == $request->newpassword)
            {
                $team->update($request->all());
                alert()->success('team Updated Successfully');
            }
            else
            {
                alert()->warning('Password Not Matched','Re-Enter Password Please');
                // alert()->success('Password Not Matched,Re-Enter Password Please');
            }
            return redirect()->back();

        }
        if($team ->email != $request->email){
            $validator = Validator::make($request->all(),[
                'email' => 'required|unique:companies'
            ]);
    
            if($validator->fails()){
                alert()->warning('Email Address  already exists');
                return redirect()->back();
            }
            if($request->password == $request->newpassword)
            {
                $team->update($request->all());
                alert()->success('team Updated Successfully');
            }
            else
            {
                alert()->warning('Password Not Matched','Re-Enter Password Please');
                // alert()->success('Password Not Matched,Re-Enter Password Please');
            }
            return redirect()->back();
        }
        if($team ->name != $request->name)
        {

            $validators = Validator::make($request->all(),[
                'name' => 'required|unique:companies'
            ]);
            if($validators->fails()){
                alert()->warning('team Name already exists');
                return redirect()->back();
            }
            if($request->password == $request->newpassword)
            {
                $team->update($request->all());
                alert()->success('team Updated Successfully');
            }
            else
            {
                alert()->warning('Password Not Matched','Re-Enter Password Please');
                // alert()->success('Password Not Matched,Re-Enter Password Please');
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
}
