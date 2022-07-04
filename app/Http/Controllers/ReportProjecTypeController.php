<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportProjecTypeController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }
    public  function  index()
    {


        $totaliteme=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'procurmenttype.id')->groupBy('procurmenttype.id')

            ->where('procurmenttype.id',1)->where('registerprocurement.reject_id',0)->first();
        if($totaliteme)
        {
            $totaliteme=$totaliteme->total;
        }

        $totalbulding=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'procurmenttype.id')->groupBy('procurmenttype.id')

            ->where('procurmenttype.id',2)->where('registerprocurement.reject_id',0)->first();
        if(isset($totalbulding))
        {
            $totalbulding=$totalbulding->total;
        }

        $totalmetting=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'procurmenttype.id')->groupBy('procurmenttype.id')

            ->where('procurmenttype.id',3)->where('registerprocurement.reject_id',0)->first();
        if(isset($totalmetting))
        {
            $totalmetting=$totalmetting->total;
        }

        return view('Report.ProjectType.Project_Type',compact('totalbulding','totaliteme','totalmetting'));
    }
    public  function  index_incomplete()
    {


        $totaliteme=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'procurmenttype.id')->groupBy('procurmenttype.id')
            ->where('registerprocurement.is_complete',0)
            ->where('procurmenttype.id',1)->where('registerprocurement.reject_id',0)->first();
        if($totaliteme)
        {
            $totaliteme=$totaliteme->total;
        }

        $totalbulding=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'procurmenttype.id')->groupBy('procurmenttype.id')
            ->where('registerprocurement.is_complete',0)
            ->where('procurmenttype.id',2)->where('registerprocurement.reject_id',0)->first();
        if(isset($totalbulding))
        {
            $totalbulding=$totalbulding->total;
        }

        $totalmetting=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'procurmenttype.id')->groupBy('procurmenttype.id')
            ->where('registerprocurement.is_complete',0)
            ->where('procurmenttype.id',3)->where('registerprocurement.reject_id',0)->first();
        if(isset($totalmetting))
        {
            $totalmetting=$totalmetting->total;
        }

        return view('Report.ProjectType_incomplete.Project_Type',compact('totalbulding','totaliteme','totalmetting'));
    }

    public function  Find_Project_Type_Year_Report_List(Request $request)
    {
        $data=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select('registerprocurement.Pro_Code','registerprocurement.Project_Name','procurmenttype.ProName','registerprocurement.Location')
            ->where('complate_project.Complate_Date','like',$request->data.'%')->where('registerprocurement.reject_id',0)->get();
        return response()->json($data);

    }

    public function  Find_Project_Type_Year_Report_List_incomplete(Request $request)
    {
        $data=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select('registerprocurement.Pro_Code','procurmenttype.ProName','registerprocurement.Project_Name','registerprocurement.Location')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.Order_Date','like',$request->data.'%')->where('registerprocurement.reject_id',0)->get();
        return response()->json($data);

    }
    public  function  Find_Year_Total_Project_Type(Request $request)
    {

        $data=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'procurmenttype.id')->groupBy('procurmenttype.id')

            ->where('complate_project.Complate_Date','like',$request->data.'%')->where('registerprocurement.reject_id',0)->get();
        return response()->json($data);

    }
    public  function  Find_Year_Total_Project_Type_incomplete(Request $request)
    {

        $data=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('count(registerprocurement.id) as total'),'procurmenttype.id')->groupBy('procurmenttype.id')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.Order_Date','like',$request->data.'%')->where('registerprocurement.reject_id',0)->get();
        return response()->json($data);

    }

}
