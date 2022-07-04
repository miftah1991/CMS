<?php

namespace App\Http\Controllers;

use App\Contract;
use App\ContractCompany;
use App\RegisterProcurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Workpersantage;
use Illuminate\Support\Facades\Auth;
use App\CompleteProject;
use App\Process;

class WorkPerController extends Controller
{
  public  function  index()
  {


      $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')
          ->where('registerprocurement.is_complete',0)
          ->where('registerprocurement.reject_id',0)->get();

      return view('WorkPersantage.index',compact('register_project'));

  }


    public  function  List_Persantage()
    {


        $data = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')
            ->join('workpersantage', 'workpersantage.Pro_Fid', 'registerprocurement.id')

            ->select(DB::raw('count(workpersantage.id)as total,registerprocurement.id,registerprocurement.Pro_Code,registerprocurement.Project_Member'))->orderBy('registerprocurement.id', 'desc')

        ->groupBy('workpersantage.Pro_Fid','registerprocurement.id','registerprocurement.Pro_Code','registerprocurement.Project_Member')->get();





        return view('WorkPersantage.List',compact('data'));

    }

public  function  View($id)
{
    $data=RegisterProcurement::find($id);
    $persantage=Workpersantage::where('Pro_Fid',$data->id)->get();


    return view('WorkPersantage.view',compact('data','persantage'));


}

    public  function  print($id)
    {


        $data=RegisterProcurement::find($id);
        $persantage=Workpersantage::where('Pro_Fid',$data->id)->get();

        $contract=Contract::where('Pro_Fid',$data->id)->first();
        $contractComapny=ContractCompany::where('Con_Fid',$contract->id)->first();

        return view('WorkPersantage.print',compact('data','persantage','contract','contractComapny'));


    }



    public  function  store(Request $request)
  {


      if($request->hasFile('warrenty')){

          $warrenty_file=$request->file('warrenty');

          $Attribute = $warrenty_file->getClientOriginalName();
          $Extension = $warrenty_file->getClientOriginalExtension();

          $warrenty =  $Attribute.date('mdYHis') . uniqid().'.'.$Extension;
          $warrenty_file->storeAs('public/Perstange', $warrenty);

      }
      else
      {
          $warrenty='';

      }


      $Workpersantage= new Workpersantage();
      $Workpersantage->Pro_Fid     =$request->Pro_Fid     ;
      $Workpersantage->Per_Name    =$request->Per_Name    ;
      $Workpersantage->  Persantage=$request->  Persantage;
      $Workpersantage->  Amount    =$request->  Amount    ;
      $Workpersantage->  Net_Amount=$request->  Net_Amount;
      $Workpersantage->  Date      =$request->  Date      ;
      $Workpersantage->  warrenty=$warrenty;

      $Workpersantage->  Warrenty_Number    =$request->  Warrenty_Number    ;
      $Workpersantage->  Start_Date_Tazmin=$request->  Start_Date_Tazmin;
      $Workpersantage->  End_Date_Tazmin      =$request->  End_Date_Tazmin      ;
      $Workpersantage->  bank      =$request->  bank      ;





      $Workpersantage->  remark      =$request->remark      ;
      $Workpersantage->  Add_id    =Auth::user()->id;  ;
      $Workpersantage->save();


      if($Workpersantage->save())
      {

          $process= new Process();
          $process->Pro_Fid=$request->Pro_Fid;
          $process->tblnanme="persantage";
          $process->Name="پروژه حالت وصول فیصدی است";
          $process->save();

      }

      return back()->with('msg','معلوماث شما ثپت شد');

  }

  public  function Get_Perstange(Request $request)
  {

      $data =Workpersantage::where('Pro_Fid',$request->id)->get();
      return response()->json($data);

  }

public  function  Find_Total_Persantage(Request $request)
{

    $sum=Workpersantage::where('Pro_Fid',$request->id)->sum('Persantage');
    return response()->json($sum);


}
public  function  Delete_Persantage($id)
{
    $data=Workpersantage::where('id',$id)->first();
    $complete_project=CompleteProject::where('Pro_Fid',$data->Pro_Fid)->first();

    if($complete_project)
    {
        return redirect()->action('LoginController@logout')  ;
    }
    else
    {
        Workpersantage::where('id',$id)->delete();
        return back();
    }


}















}
