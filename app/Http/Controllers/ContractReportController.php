<?php

namespace App\Http\Controllers;

use App\RegisterProcurement;
use Illuminate\Http\Request;
use App\ContractReport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContractReportController extends Controller
{
 public  function  index()
 {

     $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')
         ->where('registerprocurement.is_complete',0)
         ->where('registerprocurement.reject_id',0)->get();
     return view('Contract_Team_Report.index',compact('register_project'));

 }



 public  function  List()
 {
     $data=ContractReport::OrderBy('id','desc')->get();

     return  view('Contract_Team_Report.List',compact('data'));

 }

public  function  Edit($id)
{

    $data=ContractReport::where('id',$id)->first();
    $register_project=RegisterProcurement::where('id',$data->Pro_Fid)->get();

    return  view('Contract_Team_Report.Edit',compact('data','register_project'));

}



public  function  Update(Request $request)
{
    if ($request->hasFile('Report_File')) {

        $Reject_Report_File = $request->file('Report_File');
        $Requst_Image = $Reject_Report_File->getClientOriginalName();
        $Extension = $Reject_Report_File->getClientOriginalExtension();
        $ReportFile = $Requst_Image . date('mdYHis') . uniqid() . '.' . $Extension;

        $Reject_Report_File->storeAs('public/Contract_Report', $ReportFile);

    }
    else {
        $ReportFile = $request->ReportFile;
    }


    $ContractRepport=ContractReport::where('id',$request->id)->first();
    $ContractRepport-> Save_Date   =$request->Save_Date  ;
    $ContractRepport-> Subject     =$request->Subject    ;
    $ContractRepport-> Report_File =$ReportFile;
    $ContractRepport-> Pro_Fid     =$request->Pro_Fid    ;
    $ContractRepport-> Remarks     =$request->Remarks    ;
    $ContractRepport-> Add_id      = Auth::user()->id    ;
    $ContractRepport->save();
    return redirect()->action('ContractReportController@List')->with('msg','تغیرات شما ثپت شد');





}






 public  function  store(Request $request)
 {


     if ($request->hasFile('Report_File')) {

         $Reject_Report_File = $request->file('Report_File');
         $Requst_Image = $Reject_Report_File->getClientOriginalName();
         $Extension = $Reject_Report_File->getClientOriginalExtension();
         $ReportFile = $Requst_Image . date('mdYHis') . uniqid() . '.' . $Extension;

         $Reject_Report_File->storeAs('public/Contract_Report', $ReportFile);

     }
     else {
         $ReportFile = '';
     }

     $ContractRepport= new ContractReport();
    $ContractRepport-> Save_Date   =$request->Save_Date  ;
    $ContractRepport-> Subject     =$request->Subject    ;
    $ContractRepport-> Report_File =$ReportFile;
    $ContractRepport-> Pro_Fid     =$request->Pro_Fid    ;
    $ContractRepport-> Remarks     =$request->Remarks    ;
    $ContractRepport-> Add_id      = Auth::user()->id    ;
    $ContractRepport->save();
     return redirect()->action('ContractReportController@List')->with('msg','معلومات شما ثپت شد');

 }


 public  function  Print($id)
 {

     $data=ContractReport::where('id',$id)->first();
     return  view('Contract_Team_Report.print',compact('data'));
 }

 public  function  View($id)
 {
     $data=ContractReport::where('id',$id)->first();
     return  view('Contract_Team_Report.view',compact('data'));
 }

}
