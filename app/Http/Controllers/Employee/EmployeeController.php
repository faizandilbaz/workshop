<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function update(Request $request, $id)
    {
        $employee = User::find($id);
        $employee->update($request->all());
        return redirect()->back();
    }
}
