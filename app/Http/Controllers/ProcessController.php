<?php

namespace App\Http\Controllers;

use App\AnouceProject;
use App\AounceProjectMemberList;
use App\Archive;
use App\Award;
use App\CompanyContact;
use App\Complain;
use App\CompleteProject;
use App\Contract;
use App\RegisterProcurement;
use Illuminate\Http\Request;
use App\Process;
use Illuminate\Support\Facades\DB;

class ProcessController extends Controller
{

    public  function Find_Prcess(Request $request)
    {
       $data=Process::where('Pro_Fid',$request->id)->get();
       return response()->json($data);

    }

    public  function  view_process($id, $tblname)
    {

       if($tblname=="register")
       {


           $data=RegisterProcurement::where('id',$id)->first();


           return view('System.view',compact('data'));
       }
        if($tblname=="aounce")
        {


            $data=AnouceProject::where('Pro_Fid',$id)->first();

            $Member_List=AounceProjectMemberList::where('Ano_Fid',$data->id)->get();


            return view('Anounce_Project.view',compact('data','Member_List'));



        }

if($tblname=="award")
{
    $data=Award::where('Pro_Fid',$id)->first();
    $company=CompanyContact::where('Awar_Fid',$data->id)->first();
    return view('Award_Company.View',compact('data','company'));


}




if($tblname=="complain")
{
    $data=Complain::where('Pro_Fid',$id)->first();

    $companyaward= CompanyContact::where('Awar_Fid',$data->registerprocurement->award->id)->first();
    $offer_company_List=CompanyContact::where('Com_Fid',$data->id)->get();
    return view('Complain_Company.view',compact('data','companyaward','offer_company_List'));


}



if($tblname=="complete")
{
    $data=CompleteProject::where('Pro_Fid',$id)->first();


    return view('Complete_Project.view',compact('data'));


}

        if($tblname=="contract")
        {
            $data=Contract::where('Pro_Fid',$id)->first();
            //dd($data);
            $Member_List=AounceProjectMemberList::where('Con_Fid',$data->id)->get();

            return view('Contract_Company.View',compact('data','Member_List'));

        }





    }



public  function  Process_Complete()
{
    $paymant=DB::table('paymant')->join('registerprocurement','registerprocurement.id','paymant.Pro_Fid')
        ->select(DB::raw('sum(Qunity)as total'),'paymant.Pro_Fid','registerprocurement.Pro_Code')
        ->groupBy('Pro_Code')
        ->groupBy('Pro_Fid')
        ->where('is_complete',0)
        ->where('reject_id',0)->get();
    $register_project=RegisterProcurement::orderBy('id','desc')->get();
    return view('Process.Process_Complete',compact('register_project','paymant'));

}


    public  function  Process()
    {
        $count1=DB::table('procurmenttype')->join('registerprocurement','registerprocurement.Pro_Type_Fid','procurmenttype.id')
            ->select(DB::raw('count(registerprocurement.Pro_Type_Fid) as totalregisterprocurement'))
            ->groupBy('registerprocurement.Pro_Type_Fid')->where('registerprocurement.Pro_Type_Fid',1)
            ->where('registerprocurement.reject_id',0)
            ->first();
        if(isset($count1))
        {
            $count1=$count1;
        }

        $Bulding_count1=DB::table('procurmenttype')->join('registerprocurement','registerprocurement.Pro_Type_Fid','procurmenttype.id')
            ->select(DB::raw('count(registerprocurement.Pro_Type_Fid) as totalregisterprocurement'))
            ->groupBy('registerprocurement.Pro_Type_Fid')->where('registerprocurement.Pro_Type_Fid',2)
            ->where('registerprocurement.reject_id',0)
            ->first();
        if(isset($Bulding_count1))
        {
            $Bulding_count1=$Bulding_count1;
        }
        $metting_count1=DB::table('procurmenttype')->join('registerprocurement','registerprocurement.Pro_Type_Fid','procurmenttype.id')
            ->select(DB::raw('count(registerprocurement.Pro_Type_Fid) as totalregisterprocurement'))
            ->groupBy('registerprocurement.Pro_Type_Fid')->where('registerprocurement.Pro_Type_Fid',3)
            ->where('registerprocurement.reject_id',0)
            ->first();

        if(isset($metting_count1))
        {
            $metting_count1=$metting_count1;
        }

        $Archive=Archive::count('id');

        $register_project=RegisterProcurement::orderBy('id','desc')->get();




        $dabs=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')->groupBy('founder.id')
            ->groupBy('founder.FouName')
            ->where('founder.id',1)->where('registerprocurement.reject_id',0)->first();
        if($dabs)
        {
            $dabs=$dabs->total;
        }
        $nabank=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')->groupBy('founder.id')
            ->groupBy('founder.FouName')
            ->where('founder.id',2)->where('registerprocurement.reject_id',0)->first();
        if(isset($nabank))
        {
            $nabank=$nabank->total;
        }

        $asiabank=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')->groupBy('founder.id')
            ->groupBy('founder.FouName')
            ->where('founder.id',3)->where('registerprocurement.reject_id',0)->first();
        if($asiabank)
        {
            $asiabank=$asiabank->total;
        }


        $naprocurement=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')->groupBy('founder.id')
            ->groupBy('founder.FouName')
            ->where('founder.id',4)->where('registerprocurement.reject_id',0)->first();
        if($naprocurement)
        {
            $naprocurement=$naprocurement->total;
        }












        return view('Process.Process',compact('count1','register_project','Bulding_count1','metting_count1','Archive','dabs','asiabank','nabank','naprocurement'));

    }
public  function  view_process_complete(Request $request)
{

$id=$request->Pro_Fid;
    return view('Process.Process_Complete_view',compact('id'));


}




}
