<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportFounderController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }
    public  function  Founder_Report()
{



    $dabs=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
        ->join('founder','founder.id','registerprocurement.Fou_Fid')
        ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')->groupBy('founder.id')
        ->groupBy('founder.FouName')
        ->where('founder.id',1)->where('registerprocurement.reject_id',0)->first();
    if($dabs)
    {
        $dabs=$dabs->total;
    }
    $nabank=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
        ->join('founder','founder.id','registerprocurement.Fou_Fid')
        ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')->groupBy('founder.id')
        ->groupBy('founder.FouName')
        ->where('founder.id',2)->where('registerprocurement.reject_id',0)->first();
    if(isset($nabank))
    {
        $nabank=$nabank->total;
    }

    $asiabank=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
        ->join('founder','founder.id','registerprocurement.Fou_Fid')
        ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')->groupBy('founder.id')
        ->groupBy('founder.FouName')
        ->where('founder.id',3)->where('registerprocurement.reject_id',0)->first();
    if($asiabank)
    {
        $asiabank=$asiabank->total;
    }



    return view('Report.Founder.Founder_Report',compact('dabs','nabank','asiabank'));
}
    public  function  Founder_Report_incomplete()
    {



        $dabs=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')->groupBy('founder.id')
            ->groupBy('founder.FouName')
            ->where('founder.id',1)->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.is_complete',0)
            ->first();
        if($dabs)
        {
            $dabs=$dabs->total;
        }
        $nabank=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')->groupBy('founder.id')
            ->groupBy('founder.FouName')
            ->where('founder.id',2)->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.is_complete',0)->first();
        if(isset($nabank))
        {
            $nabank=$nabank->total;
        }

        $asiabank=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')->groupBy('founder.id')
            ->groupBy('founder.FouName')
            ->where('founder.id',3)->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.is_complete',0)->first();
        if($asiabank)
        {
            $asiabank=$asiabank->total;
        }



        return view('Report.Founder_incomplete.Founder_Report',compact('dabs','nabank','asiabank'));
    }

    public function  Find_Year_Report_incomplete(Request $request)
    {
        $data=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select('registerprocurement.Pro_Code','founder.FouName','registerprocurement.Project_Name')->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.Order_Date','like',$request->data.'%')
            ->where('registerprocurement.is_complete',0)
            ->get();
        return response()->json($data);

    }
    public function  Find_Year_Report(Request $request)
    {
        $data=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select('registerprocurement.Pro_Code','founder.FouName','registerprocurement.Project_Name')->where('registerprocurement.reject_id',0)
            ->where('complate_project.Complate_Date','like',$request->data.'%')->get();
        return response()->json($data);

    }

    public  function  Find_Year_Total(Request $request)
{
    $data=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')

        ->select( DB::raw('count(registerprocurement.id) as total'))
        ->where('complate_project.Complate_Date','like',$request->data.'%')->where('registerprocurement.reject_id',0)->get();
    return response()->json($data);


}
    public  function  Find_Year_Total_incomplete(Request $request)
    {
        $data=DB::table('registerprocurement')

            ->select( DB::raw('count(registerprocurement.id) as total'))
            ->where('registerprocurement.Order_Date','like',$request->data.'%')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->get();
        return response()->json($data);


    }


    public  function  Find_Year_Total_Founder(Request $request)
    {
        $data=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')->where('registerprocurement.reject_id',0)->groupBy('founder.id')
            ->groupBy('founder.FouName')
            ->where('complate_project.Complate_Date','like',$request->data.'%')->get();
        return response()->json($data);


    }
    public  function  Find_Year_Total_Founder_incomplete(Request $request)
    {
        $data=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'founder.FouName','founder.id')

            ->where('registerprocurement.reject_id',0)->groupBy('founder.id')
            ->groupBy('founder.FouName')
            ->where('registerprocurement.Order_Date','like',$request->data.'%')
            ->where('registerprocurement.is_complete',0)
            ->get();
        return response()->json($data);


    }
}
