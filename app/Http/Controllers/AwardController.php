<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisterProcurement;
use App\Award;
use App\CompanyContact;
use Illuminate\Support\Facades\DB;
use Auth;
use App\CompleteProject;
use App\Process;

class AwardController extends Controller
{


    public  function  index()
    {

        $register_project=DB::table('registerprocurement')->join('evaluation','evaluation.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->get();

        return view('Award_Company.index',compact('register_project'));
    }

    public  function  store(Request $request)
    {

//        $this->validate($request,[
//            'Pro_Fid'=>'required',
//            'Contract_Date'=>'required',
//            'Offer_Date'=>'required',
//            'Bank'=>'required',
//            'Export_End_Date'=>'required',
//            'Export_Strat_Date'=>'required',
//            'Work_File'=>'required',
//            'Contract_File'=>'required',
//            'Camison_File'=>'required',
//            'Offer_File'=>'required',
//            'Warrenty_File'=>'required',
//            'Helth_File'=>'required',
//
//            'Contract_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc',
//            'Camison_File'=>'mimes:jpeg,jpg,png,gif,doc,pdf',
//            'Offer_File'=>'mimes:jpeg,jpg,png,gif,pdf',
//            'Warrenty_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc',
//            'Helth_File'=>'mimes:jpeg,jpg,png,gif,doc,pdf',
//
//
//
//        ],
//            ['Pro_Fid.required'=>'لطفا اسم پروژه داخل کنید',
//                'Contract_Date.required'=>'لطفا تاریخ اعطایی قرارداد داخل کنید',
//
//                'Offer_Date.required'=>'لطفا تاریخ نامه قبولی افر داخل کنید',
//                'Bank.required'=>'لطفا بانک مربوطه کنید',
//                'Export_End_Date.required'=>'لطفا اتاریخ صدرو تضمین کار کنید',
//                'Export_Strat_Date.required'=>'لطفاتاریخ ختم صدور تضمین داخل کنید',
//
//
//                   'Contract_File.required'=>'لطفا بانک مربوطه کنید',
//                'Camison_File.required'=>'لطفا اتاریخ صدرو تضمین کار کنید',
//                'Offer_File.required'=>'لطفاتاریخ ختم صدور تضمین داخل کنید',
//                  'Warrenty_File.required'=>'لطفا بانک مربوطه کنید',
//                'Helth_File.required'=>'لطفا اتاریخ صدرو تضمین کار کنید'
//
//            ]);


        if($request->hasFile('Contract_File')){

            $Contract_File=$request->file('Contract_File');

            $Contract = $Contract_File->getClientOriginalName();
            $Extension = $Contract_File->getClientOriginalExtension();

            $ContractFile =  $Contract.date('mdYHis') . uniqid().'.'.$Extension;
            $Contract_File->storeAs('public/Award', $ContractFile);

        } else
        {
            $ContractFile='';

        }
        if($request->hasFile('Camison_File')){

            $Camison_File=$request->file('Camison_File');

            $Camison = $Camison_File->getClientOriginalName();
            $Extension = $Camison_File->getClientOriginalExtension();

            $CamisonFile =  $Camison.date('mdYHis') . uniqid().'.'.$Extension;
            $Camison_File->storeAs('public/Award', $CamisonFile);

        }
        else
        {
            $CamisonFile='';
        }

        if($request->hasFile('Offer_File')){

            $Offer_File=$request->file('Offer_File');

            $Offer = $Offer_File->getClientOriginalName();
            $Extension = $Offer_File->getClientOriginalExtension();

            $OfferFile =  $Offer.date('mdYHis') . uniqid().'.'.$Extension;
            $Offer_File->storeAs('public/Award', $OfferFile);

        }
        {
            $OfferFile='';
        }








        $Award= new Award();

$Award->Offer_Date       =$request->Offer_Date       ;
$Award->Pro_Fid          =$request->Pro_Fid          ;

$Award->Contract_Date    =$request->Contract_Date    ;

$Award->rupee=$request->rupee;
$Award->Contract_File    =$ContractFile    ;
$Award->Camison_File     =$CamisonFile     ;
$Award->Offer_File       =$OfferFile       ;



$Award->remark           =$request->remark           ;
$Award->Add_id           =Auth::user()->id         ;

$Award->save();


if($Award->save())
{

    $process= new Process();
    $process->Pro_Fid=$request->Pro_Fid;
    $process->tblnanme="award";
    $process->Name="پروژه حالت ارزیابی برنده شرکت";
    $process->save();

}
if($Award->save()) {

    $OfferCompnayContact = new  CompanyContact();
    $OfferCompnayContact->Name = $request->Name;
    $OfferCompnayContact->jawaz = $request->Jawaz;
    $OfferCompnayContact->MemberName = $request->MemberName;
    $OfferCompnayContact->Phone = $request->Phone;
    $OfferCompnayContact->Email = $request->Email;
    $OfferCompnayContact->Awar_Fid = $Award->id;
    $OfferCompnayContact->save();




}
return redirect()->action('AwardController@List')->with('msg','معلومات شما ثپت شد');

    }


public  function  List()
{
    $data=Award::orderBy('id','desc')->get();
    return view('Award_Company.List',compact('data'));


}
public  function Edit($id)
{
    $data=Award::find($id);
    $complete_project=CompleteProject::where('Pro_Fid',$data->id)->first();

    if($complete_project)
    {
        return redirect()->action('LoginController@logout')  ;
    }
    else
    {

        $register_project=DB::table('registerprocurement')->join('evaluation','evaluation.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')
            ->where('registerprocurement.id',$data->Pro_Fid)->get();


        $offer_company_List=CompanyContact::where('Awar_Fid',$data->id)->get();
        return view('Award_Company.Edit',compact('data','register_project','offer_company_List'));
    }

}
public  function  Update(Request $request)
{

    $this->validate($request,[
        'Pro_Fid'=>'required',
        'Contract_Date'=>'required',
        'Offer_Date'=>'required',
        'Bank'=>'required',
        'Export_End_Date'=>'required',
        'Export_Strat_Date'=>'required'




    ],
        ['Pro_Fid.required'=>'لطفا اسم پروژه داخل کنید',
            'Contract_Date.required'=>'لطفا تاریخ اعطایی قرارداد داخل کنید',

            'Offer_Date.required'=>'لطفا تاریخ نامه قبولی افر داخل کنید',
            'Bank.required'=>'لطفا بانک مربوطه کنید',
            'Export_End_Date.required'=>'لطفا اتاریخ صدرو تضمین کار کنید',
            'Export_Strat_Date.required'=>'لطفاتاریخ ختم صدور تضمین داخل کنید'



        ]);


    if($request->hasFile('Contract_File')){

        $Contract_File=$request->file('Contract_File');

        $Contract = $Contract_File->getClientOriginalName();
        $Extension = $Contract_File->getClientOriginalExtension();

        $ContractFile =  $Contract.date('mdYHis') . uniqid().'.'.$Extension;
        $Contract_File->storeAs('public/Award', $ContractFile);

    }
    else
    {
        $ContractFile=$request->ContractFile;
    }
    if($request->hasFile('Camison_File')){

        $Camison_File=$request->file('Camison_File');

        $Camison = $Camison_File->getClientOriginalName();
        $Extension = $Camison_File->getClientOriginalExtension();

        $CamisonFile =  $Camison.date('mdYHis') . uniqid().'.'.$Extension;
        $Camison_File->storeAs('public/Award', $CamisonFile);

    }
    else
    {
        $CamisonFile=$request->CamisonFile;
    }

    if($request->hasFile('Offer_File')){

        $Offer_File=$request->file('Offer_File');

        $Offer = $Offer_File->getClientOriginalName();
        $Extension = $Offer_File->getClientOriginalExtension();

        $OfferFile =  $Offer.date('mdYHis') . uniqid().'.'.$Extension;
        $Offer_File->storeAs('public/Award', $OfferFile);

    }
    else
    {
        $OfferFile=$request->OfferFile;
    }



    $Award=Award::find($request->id);


    $Award->Offer_Date       =$request->Offer_Date       ;
    $Award->Pro_Fid          =$request->Pro_Fid          ;
    $Award->Bank             =$request->Bank             ;
    $Award->Contract_Date    =$request->Contract_Date    ;

    $Award->rupee=$request->rupee;
    $Award->Contract_File    =$ContractFile    ;
    $Award->Camison_File     =$CamisonFile     ;
    $Award->Offer_File       =$OfferFile       ;
    $Award->Warrent_Rupee=$request->Warrent_Rupee;
    $Award->Export_Strat_Date=$request->Export_Strat_Date;
    $Award->Export_End_Date  =$request->Export_End_Date  ;
    $Award->remark           =$request->remark           ;
    $Award->Add_id           =Auth::user()->id         ;


    $Award->save();

if($Award->save())
{
    $rows = $request->rows;
    if (isset($rows)) {
        $rows = $request->rows;
        foreach ($rows as $row) {
            $OfferCompnayContact= new  CompanyContact();
            $OfferCompnayContact->Name=$row['Name'];
            $OfferCompnayContact->jawaz=$row['Jawaz'];
            $OfferCompnayContact->MemberName=$row['MemberName'];
            $OfferCompnayContact->Phone=$row['Phone'];
            $OfferCompnayContact->Email= $row['Email'];
            $OfferCompnayContact->Awar_Fid = $Award->id;
            $OfferCompnayContact->save();

        } }
    }
    return redirect()->action('AwardController@List')->with('msg','ممعلوت شما تغیر شد');
}

public  function  View($id)
{

    $data=Award::find($id);
    $company=CompanyContact::where('Awar_Fid',$data->id)->first();
    return view('Award_Company.View',compact('data','company'));


}
    public  function  print($id)
    {

        $data=Award::find($id);
        $company=CompanyContact::where('Awar_Fid',$data->id)->first();
        return view('Award_Company.print',compact('data','company'));


    }
}
