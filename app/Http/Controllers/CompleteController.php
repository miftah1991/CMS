<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompleteProject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Process;
use App\RegisterProcurement;

class CompleteController extends Controller
{

    public  function  index()
    {
        $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->get();
        return view('Complete_Project.index',compact('register_project'));
    }


    public  function  store(Request $request)
    {
        if($request->hasFile('Taminat_File')){

            $Taminat_File=$request->file('Taminat_File');

            $Requst_Image = $Taminat_File->getClientOriginalName();
            $Extension = $Taminat_File->getClientOriginalExtension();

            $TaminatFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Taminat_File->storeAs('public/Extand', $TaminatFile);

        }
        else
        {
            $TaminatFile='';
        }
        if($request->hasFile('Confirm_File')){

            $Confirm_File=$request->file('Confirm_File');

            $Basic = $Confirm_File->getClientOriginalName();
            $Extension = $Confirm_File->getClientOriginalExtension();

            $ConfirmFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
            $Confirm_File->storeAs('public/Complete', $ConfirmFile);

        }
        else
        {
            $ConfirmFile='';
        }

        if($request->hasFile('Warrenty_File')){

            $Warrenty_File=$request->file('Warrenty_File');

            $Attribute = $Warrenty_File->getClientOriginalName();
            $Extension = $Warrenty_File->getClientOriginalExtension();

            $WarrentyFile =  $Attribute.date('mdYHis') . uniqid().'.'.$Extension;
            $Warrenty_File->storeAs('public/Complete', $WarrentyFile);

        }
        else
        {
            $WarrentyFile='';
        }


       $CompleteProject= new CompleteProject();


        $CompleteProject->Complate_Date=$request->Complate_Date;
        $CompleteProject->Confirm_File =$ConfirmFile ;
        $CompleteProject->Warrenty_File=$WarrentyFile;
        $CompleteProject->Taminat_File =$TaminatFile ;
        $CompleteProject->Remarks =$request->Remarks ;
        $CompleteProject->Pro_Fid      =$request->Pro_Fid      ;
        $CompleteProject->Add_id       =Auth::user()->id       ;
        $CompleteProject->save();
        if($CompleteProject->save())
        {

            $RegisterProcurement=RegisterProcurement::find($request->Pro_Fid);
            $RegisterProcurement->is_complete=1;
            $RegisterProcurement->save();




            $process= new Process();
            $process->Pro_Fid=$request->Pro_Fid;
            $process->Name="پروژه تکمیل است";
            $process->tblnanme="complete";
            $process->complete=1;
            $process->save();
            return  back()->with('ms','ریکارد ثپت شد');
        }


    }



    public  function  Update(Request $request)
    {


        if($request->hasFile('Taminat_File')){

            $Taminat_File=$request->file('Taminat_File');

            $Requst_Image = $Taminat_File->getClientOriginalName();
            $Extension = $Taminat_File->getClientOriginalExtension();

            $TaminatFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Taminat_File->storeAs('public/Extand', $TaminatFile);

        }
        else
        {
            $TaminatFile=$request->TaminatFile;
        }
        if($request->hasFile('Confirm_File')){

            $Confirm_File=$request->file('Confirm_File');

            $Basic = $Confirm_File->getClientOriginalName();
            $Extension = $Confirm_File->getClientOriginalExtension();

            $ConfirmFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
            $Confirm_File->storeAs('public/Complete', $ConfirmFile);

        }
        else
        {
            $ConfirmFile=$request->ConfirmFile;
        }

        if($request->hasFile('Warrenty_File')){

            $Warrenty_File=$request->file('Warrenty_File');

            $Attribute = $Warrenty_File->getClientOriginalName();
            $Extension = $Warrenty_File->getClientOriginalExtension();

            $WarrentyFile =  $Attribute.date('mdYHis') . uniqid().'.'.$Extension;
            $Warrenty_File->storeAs('public/Complete', $WarrentyFile);

        }
        else
        {
            $WarrentyFile=$request->WarrentyFile;
        }


        $CompleteProject= CompleteProject::find($request->id);


        $CompleteProject->Complate_Date=$request->Complate_Date;
        $CompleteProject->Confirm_File =$ConfirmFile ;
        $CompleteProject->Warrenty_File=$WarrentyFile;
        $CompleteProject->Taminat_File =$TaminatFile ;
        $CompleteProject->Remarks =$request->Remarks ;
        $CompleteProject->Pro_Fid      =$request->Pro_Fid      ;
        $CompleteProject->Add_id       =Auth::user()->id       ;
        $CompleteProject->save();
        if($CompleteProject->save())
        {
            return  back()->with('msg','ریکارد تغیر شد');
        }
    }



    public function  List()
    {

$data=CompleteProject::orderBy('id','desc')->get();




return view('Complete_Project.List',compact('data'));
    }


    public  function  Edit($id)
    {
        $data=CompleteProject::where('id',$id)->first();
        $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')
            ->where('registerprocurement.id',$data->Pro_Fid)->orderBy('registerprocurement.id', 'desc')->get();




        return view('Complete_Project.Edit',compact('data','register_project'));

    }







    public  function  View($id)
    {

      $data=CompleteProject::find($id);


      return view('Complete_Project.view',compact('data'));
    }







}
