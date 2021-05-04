<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('create company');
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:companies',
            'name' => 'required|unique:companies'
        ]);

        if($validator->fails()){
            alert()->warning($validator->errors()->first());
            return redirect()->back();
        }

        Company::create($request->all());
        alert()->success('Company Added Successfully', 'Company Added Successfully');
        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('admin.company.detail')->with('company',$company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company :: find ($id);
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->back();
    }
}
