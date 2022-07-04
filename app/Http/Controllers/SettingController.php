<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Founder;
use App\ProcurementType;
use App\Invoicetype;
use App\role;

class SettingController extends Controller
{
    public  function Fouder_index()
    {

        $Founder=Founder::all();


        return view('Setting.Founder',compact('Founder'));
    }
    public  function  Invoice_Type_index()
    {

        $Invoice_Type=Invoicetype::all();
        return view('Setting.Invoice_Type',compact('Invoice_Type'));

    }

    public  function  Project_index()
    {
        $ProcurementType=ProcurementType::all();


        return view('Setting.Project',compact('ProcurementType'));
    }

    public  function  Role_index()
    {
        $Role=role::all();


        return view('Setting.role',compact('Role'));
    }


    public  function  Add_Fouder(Request $request)
    {
        $Founder= new Founder();
        $Founder->FouName=$request->FouName;
        $Founder->save();
        if($Founder->save())
        {

            return redirect()->action('SettingController@Fouder_index')->with('msg','تطمویل کننده ثپت شد');
        }
    }


    public  function  Add_Project(Request $request)
    {
        $ProcurementType= new ProcurementType();
        $ProcurementType->ProName=$request->ProName;
        $ProcurementType->save();
        if($ProcurementType->save())
        {

            return redirect()->action('SettingController@Project_index')->with('msg','نوع قرارداد ثپت شد');
        }
    }
    public  function  Add_Invoice_Type(Request $request)
    {
        $Invoicetype= new Invoicetype();
        $Invoicetype->name=$request->name;
        $Invoicetype->save();
        if($Invoicetype->save())
        {

            return redirect()->action('SettingController@Invoice_Type_index')->with('msg','نوع انوایس ثپت شد');
        }
    }

    public  function  Add_Role(Request $request)
    {
        $Role= new role();
        $Role->Role_Name=$request->Role_Name;
        $Role->save();
        if($Role->save())
        {

            return redirect()->action('SettingController@Role_index')->with('msg','نوع حساب کاربران ثپت شد');
        }
    }

    public  function  Edit_Founder($id)
    {
        $data=Founder::findOrFail($id);

        $Founder=Founder::all();


        return view('Setting.Edit_Founder',compact('Founder','data'));

    }
    public  function  Edit_Project($id)
    {
        $data=ProcurementType::findOrFail($id);

        $ProcurementType=ProcurementType::all();


        return view('Setting.Edit_Project',compact('ProcurementType','data'));

    }

    public  function  Edit_Invoice_Type($id)
    {
        $data=Invoicetype::findOrFail($id);

        $Invoice_Type=Invoicetype::all();


        return view('Setting.Edit_Invoice_Type',compact('Invoice_Type','data'));

    }
    public  function  Edit_Role($id)
    {
        $data=role::findOrFail($id);

        $Role=role::all();


        return view('Setting.Edit_Role',compact('Role','data'));

    }





    public  function  Update_Project(Request $request)
    {

        $ProcurementType=ProcurementType::findOrFail($request->id);
        $ProcurementType->ProName=$request->ProName;
        $ProcurementType->save();
        if($ProcurementType->save())
        {

            return redirect()->action('SettingController@Project_index')->with('msg','تغیرات ثپت شد');
        }
    }


    public  function  Update_Fouder(Request $request)
    {

        $Founder=Founder::findOrFail($request->id);
        $Founder->FouName=$request->FouName;
        $Founder->save();
        if($Founder->save())
        {

            return redirect()->action('SettingController@Fouder_index')->with('msg','تغیرات ثپت شد');
        }
    }



    public  function  Update_Invoice_Type(Request $request)
    {


        $Invoicetype=Invoicetype::findOrFail($request->id);
        $Invoicetype->name=$request->name;
        $Invoicetype->save();
        if($Invoicetype->save())
        {

            return redirect()->action('SettingController@Invoice_Type_index')->with('msg','تغیرات ثپت شد');
        }
    }


    public  function  Update_Role(Request $request)
    {


        $Role=role::findOrFail($request->id);
        $Role->Role_Name=$request->Role_Name;
        $Role->save();
        if($Role->save())
        {

            return redirect()->action('SettingController@Role_index')->with('msg','تغیرات ثپت شد');
        }
    }
}
