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
        if($request->password == $request->newpassword)
        {
            $employee->update($request->all());
            alert()->success('Employee Updated Successfully');
        }
        else
        {
            alert()->success('Password Not Matched,Re-Enter Password Please');
        }
        $employee->update($request->all());
        return redirect()->back();
    }
}
