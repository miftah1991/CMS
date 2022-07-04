<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public  function index()
    {
$company=Company::orderBy('Name','asc')->get();

        return view('Setting.company',compact('company'));
    }
    public  function  store(Request $request)
    {
        $company=new Company();
        $company->Name=$request->Name;
        $company->save();
        return back()->with('msg','شرکت قرارداد کننده ثپت شد');

    }
    public  function  Edit($id)
    {
        $company=Company::orderBy('Name','asc')->get();
        $data=Company::where('id',$id)->first();
        return view('Setting.Edit_Company',compact('data','company'));

    }
    public  function Update(Request $request)
    {
        $company=Company::where('id',$request->id)->first();
        $company->Name=$request->Name;
        $company->save();
        return redirect()->action('CompanyController@index')->with('msg','شرکت قرارداد کننده تغیر شد');


    }
}
