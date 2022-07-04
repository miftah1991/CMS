<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportFoundController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }
    public  function  index()
    {




        $totalbulding_da=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('procurmenttype.id',2)->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','da')
            ->first();
        if($totalbulding_da)
        {
            $totalbulding_da=$totalbulding_da->total;
        }

        $totalbulding_af=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('procurmenttype.id',2)->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','af')
            ->first();
if($totalbulding_af)
{
    $totalbulding_af=$totalbulding_af->total;

}

        $totaliteme_af=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->where('registerprocurement.rupee','af')
            ->groupBy('registerprocurement.rupee')
            ->where('procurmenttype.id',1)->where('registerprocurement.reject_id',0)->first();

if($totaliteme_af)
{
    $totaliteme_af=$totaliteme_af->total;
}
        $totaliteme_da=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('registerprocurement.rupee','da')
            ->where('procurmenttype.id',1)->where('registerprocurement.reject_id',0)->first();

if($totaliteme_da)
{
    $totalbulding_da=$totaliteme_da->total;
}
        $totalmetting_af=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('registerprocurement.rupee','af')
            ->where('procurmenttype.id',3)->where('registerprocurement.reject_id',0)->first();
        if($totalmetting_af)
        {
            $totalmetting_af=$totalmetting_af->total;
        }

        $totalmetting_da=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')

            ->where('procurmenttype.id',3)
            ->where('registerprocurement.rupee','da')
            ->where('registerprocurement.reject_id',0)->first();

        if($totalmetting_da)
        {
            $totalmetting_da=$totalmetting_da->total;
        }

        $nbank_af=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',2)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','af')
            ->first();

        if($nbank_af)
        {
            $nbank_af=$nbank_af->total;

        }

        $nbank_da=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',1)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','da')
            ->first();

        if($nbank_da)
        {
            $nbank_da=$nbank_da->total;

        }





        $nbank_af=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',2)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','af')
            ->first();

        if($nbank_af)
        {
            $nbank_af=$nbank_af->total;

        }

            $asiabank_da=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',3)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','da')
            ->first();

        if($asiabank_da)
        {
            $asiabank_da=$asiabank_da->total;

        }



        $asiabank_af=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',3)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','af')
            ->first();

        if($asiabank_af)
        {
            $asiabank_af=$asiabank_af->total;

        }
        $dabs_af=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',1)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','af')
            ->first();

        if($dabs_af)
        {
            $dabs_af=$dabs_af->total;

        }

        $dabs_da=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',1)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','da')
            ->first();

        if($dabs_da)
        {
            $dabs_da=$dabs_da->total;

        }






        return view('Report.Found.Found2',compact('totalbulding_af','totalbulding_da',
            'totalbulding','totaliteme_af','totaliteme_da','totalmetting_af','totalmetting_da','nbank_da','nbank_af'

        ,'asiabank_da','asiabank_af','dabs_da','dabs_af'));

    }

    public  function  index_incomplete()
    {




        $totalbulding_da=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('procurmenttype.id',2)->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.rupee','da')
            ->first();
        if($totalbulding_da)
        {
            $totalbulding_da=$totalbulding_da->total;
        }

        $totalbulding_af=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('procurmenttype.id',2)->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.rupee','af')
            ->first();
        if($totalbulding_af)
        {
            $totalbulding_af=$totalbulding_af->total;

        }

        $totaliteme_af=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->where('registerprocurement.rupee','af')
            ->where('registerprocurement.is_complete',0)
            ->groupBy('registerprocurement.rupee')
            ->where('procurmenttype.id',1)->where('registerprocurement.reject_id',0)->first();

        if($totaliteme_af)
        {
            $totaliteme_af=$totaliteme_af->total;
        }
        $totaliteme_da=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('registerprocurement.rupee','da')
            ->where('procurmenttype.id',1)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->first();

        if($totaliteme_da)
        {
            $totalbulding_da=$totaliteme_da->total;
        }
        $totalmetting_af=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('registerprocurement.rupee','af')
            ->where('procurmenttype.id',3)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->first();
        if($totalmetting_af)
        {
            $totalmetting_af=$totalmetting_af->total;
        }

        $totalmetting_da=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')

            ->where('procurmenttype.id',3)
            ->where('registerprocurement.rupee','da')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->first();

        if($totalmetting_da)
        {
            $totalmetting_da=$totalmetting_da->total;
        }

        $nbank_af=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',2)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','af')
            ->first();

        if($nbank_af)
        {
            $nbank_af=$nbank_af->total;

        }

        $nbank_da=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',1)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','da')
            ->first();

        if($nbank_da)
        {
            $nbank_da=$nbank_da->total;

        }





        $nbank_af=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',2)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','af')
            ->first();

        if($nbank_af)
        {
            $nbank_af=$nbank_af->total;

        }

        $asiabank_da=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',3)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.rupee','da')
            ->first();

        if($asiabank_da)
        {
            $asiabank_da=$asiabank_da->total;

        }



        $asiabank_af=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',3)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','af')
            ->first();

        if($asiabank_af)
        {
            $asiabank_af=$asiabank_af->total;

        }
        $dabs_af=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',1)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','af')
            ->first();

        if($dabs_af)
        {
            $dabs_af=$dabs_af->total;

        }

        $dabs_da=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->where('founder.id',1)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.rupee','da')
            ->first();

        if($dabs_da)
        {
            $dabs_da=$dabs_da->total;

        }






        return view('Report.Found_incomplete.Found2',compact('totalbulding_af','totalbulding_da',
            'totalbulding','totaliteme_af','totaliteme_da','totalmetting_af','totalmetting_da','nbank_da','nbank_af'

            ,'asiabank_da','asiabank_af','dabs_da','dabs_af'));

    }





 public  function  Find_Year_Total_Found_Founder(Request $request)
 {

     $dabs_tot=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
         ->join('founder','founder.id','registerprocurement.Fou_Fid')
         ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee','founder.id')
         ->groupBy('registerprocurement.rupee')
         ->groupBy('founder.id')
         ->where('registerprocurement.reject_id',0)
         ->where('complate_project.Complate_Date','like',$request->data.'%')

         ->get();
 return response()->json($dabs_tot);
 }

    public  function  Find_Year_Total_Found_Founder_incomplete(Request $request)
    {

        $dabs_tot=DB::table('registerprocurement')
            ->join('founder','founder.id','registerprocurement.Fou_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'registerprocurement.rupee','founder.id')
            ->groupBy('registerprocurement.rupee')
            ->groupBy('founder.id')
            ->where('registerprocurement.reject_id',0)
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.Order_Date','like',$request->data.'%')

            ->get();
        return response()->json($dabs_tot);
    }

    public  function  Find_Year_Total_Found_ProjecType(Request $request)
    {

        $data=DB::table('registerprocurement')->join('complate_project','complate_project.Pro_Fid','registerprocurement.id')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'procurmenttype.id','registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->groupBy('procurmenttype.id')

            ->where('complate_project.Complate_Date','like',$request->data.'%')->where('registerprocurement.reject_id',0)->get();
        return response()->json($data);

    }

    public  function  Find_Year_Total_Found_ProjecType_incomplete(Request $request)
    {

        $data=DB::table('registerprocurement')
            ->join('procurmenttype','procurmenttype.id','registerprocurement.Pro_Type_Fid')
            ->select( DB::raw('sum(registerprocurement.Accepts_Fund) as total'),'procurmenttype.id','registerprocurement.rupee')
            ->groupBy('registerprocurement.rupee')
            ->groupBy('procurmenttype.id')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.Order_Date','like',$request->data.'%')->where('registerprocurement.reject_id',0)->get();
        return response()->json($data);

    }









}
