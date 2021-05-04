<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        if($company ->email == $request->email && $company ->name == $request->name)
        {
            if($request->password == $request->newpassword)
            {
                $company->update($request->all());
                alert()->success('Company Updated Successfully');
            }
            else
            {
                alert()->warning('Password Not Matched','Re-Enter Password Please');
                // alert()->success('Password Not Matched,Re-Enter Password Please');
            }
            return redirect()->back();

        }
        if($company ->email != $request->email){
            $validator = Validator::make($request->all(),[
                'email' => 'required|unique:companies'
            ]);
    
            if($validator->fails()){
                alert()->warning('Email Address  already exists');
                return redirect()->back();
            }
            if($request->password == $request->newpassword)
            {
                $company->update($request->all());
                alert()->success('Company Updated Successfully');
            }
            else
            {
                alert()->warning('Password Not Matched','Re-Enter Password Please');
                // alert()->success('Password Not Matched,Re-Enter Password Please');
            }
            return redirect()->back();
        }
        if($company ->name != $request->name)
        {

            $validators = Validator::make($request->all(),[
                'name' => 'required|unique:companies'
            ]);
            if($validators->fails()){
                alert()->warning('Company Name already exists');
                return redirect()->back();
            }
            if($request->password == $request->newpassword)
            {
                $company->update($request->all());
                alert()->success('Company Updated Successfully');
            }
            else
            {
                alert()->warning('Password Not Matched','Re-Enter Password Please');
                // alert()->success('Password Not Matched,Re-Enter Password Please');
            }
            return redirect()->back();
        }
    }
}
