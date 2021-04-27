<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        if($request->password == $request->newpassword)
        {
            $company->update($request->all());
            alert()->success('Company Profile Updated Successfully');
        }
        else
        {
            alert()->success('Password Not Matched,Re-Enter Password Please');
        }
        return redirect()->back();
    }
}
