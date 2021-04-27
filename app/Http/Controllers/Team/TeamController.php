<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        if($request->password == $request->newpassword)
        {
            $team = Team::find($id);
            alert()->success('Team Updated Successfully');
        }
        else
        {
            alert()->warning('Password Not Matched','Re-Enter Password Please');
        }
        $team->update($request->all());
        return redirect()->back();
    }
}
