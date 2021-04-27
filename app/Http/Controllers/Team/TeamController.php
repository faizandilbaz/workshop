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
        $team->update($request->all());
        return redirect()->back();
    }
}
