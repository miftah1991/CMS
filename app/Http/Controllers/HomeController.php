<?php

namespace App\Http\Controllers;

use App\AounceProjectMemberList;
use Illuminate\Http\Request;
use App\RegisterProcurement;
use Illuminate\Support\Facades\DB;
use App\Archive;
use App\AnouceProject;
use jDateTime;
use App\Paymant;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function  view_rec_suppaymant($id)
    {

        $data = Paymant::where('Pro_Fid',$id)->get();

        return view('Home.List',compact('data'));


    }
    public function index()
    {



        $date = new jDateTime(true, true, 'Asia/Kabul');
        $to = $date->date("Y-m-d", false, false);
        $eval=DB::table('evaluation')->join('registerprocurement','registerprocurement.id','evaluation.Pro_Fid')
            ->select('evaluation.*','registerprocurement.id as Regid','registerprocurement.Pro_Code')

            ->where('End_Date','>=',$to)->get();


        $cont=DB::table('contract')->join('registerprocurement','registerprocurement.id','contract.Pro_Fid')
            ->select('contract.*','registerprocurement.id as Regid','registerprocurement.Pro_Code',DB::raw("DATEDIFF(End_Date_Contract,'$to') as day "))
            ->where('contract_email',0)
            ->where('End_Date_Contract','>=',$to)->get();



        $item=DB::table('contract')->join('registerprocurement','registerprocurement.id','contract.Pro_Fid')
            ->select('contract.*','registerprocurement.id as Regid','registerprocurement.Pro_Code',DB::raw("DATEDIFF(Date_To_Item,'$to') as day "))


            ->where('item_email',0)
            ->where( DB::raw("DATEDIFF(Date_To_Item,'$to') "),'>=',2)
            ->where( DB::raw("DATEDIFF(Date_To_Item,'$to') "),'<=',100)
            ->where('Date_To_Item','>=',$to)->get();


        $Tazmin=DB::table('contract')->join('registerprocurement','registerprocurement.id','contract.Pro_Fid')
            ->select('contract.*','registerprocurement.id as Regid','registerprocurement.Pro_Code',DB::raw("DATEDIFF(Export_End_Date,'$to') as day "))
            ->where('Tazmin_email',0)
            ->where( DB::raw("DATEDIFF(Export_End_Date,'$to')"),'>=',1)
            ->where( DB::raw("DATEDIFF(Export_End_Date,'$to')"),'<=',500)
            ->where('Export_End_Date','>=',$to)->get();


        $ext=DB::table('extendproject')->join('registerprocurement','registerprocurement.id','extendproject.Pro_Fid')
            ->select('extendproject.*','registerprocurement.id as Regid','registerprocurement.Pro_Code',DB::raw("DATEDIFF(Start_Date,'$to') as day "))


            ->where('End_Date','>=',$to)->get();








       $offer_date= DB::table('anouce_project')->select(

          'id'

        )->where( DB::raw("DATEDIFF(Offer_Date,'$to') "),'>=',2)->where('offer_email',0)

           ->where('Offer_Date','>',$to)
           ->get();

        $met_date= DB::table('anouce_project')->select(

            'id'

        )->where( DB::raw("DATEDIFF(Met_Date,'$to') "),'>=',2)->where('met_email',0)->get();

        $eval_date= DB::table('evaluation')->select(

            'id'

        )->where( DB::raw("DATEDIFF(Start_Date,'$to') "),'>=',1)->where('eval_email',0)->get();


        $Contract_date= DB::table('contract')->select(

            'id'

        )->where( DB::raw("DATEDIFF(Start_Date_Contract,'$to') "),'>=',2)->where('contract_email',0)->get();

        $Extand_date= DB::table('extendproject')->select(

            'id'

        )->where( DB::raw("DATEDIFF(Start_Date,'$to') "),'>=',1)->where('extand_email',0)->get();







        return view('home',compact('offer_date','met_date','eval_date','Contract_date','Extand_date','eval','cont','ext','item','Tazmin'));

    }

    public  function  Find_Offer_Date_Email()
    {
        $date = new jDateTime(true, true, 'Asia/Kabul');
        $to = $date->date("Y-m-d", false, false);
        $data=DB::table('anouce_project')->join('registerprocurement','registerprocurement.id','anouce_project.Pro_Fid')
            ->select('anouce_project.id','anouce_project.Offer_Date','registerprocurement.id as Regid','registerprocurement.Pro_Code',DB::raw("DATEDIFF(Offer_Date,'$to') as day "))
       ->where('Offer_Date','>=',$to)->where('offer_email',0)->get();
        return response()->json($data);
    }


    public  function  Find_Met_Date_Email()
    {
        $date = new jDateTime(true, true, 'Asia/Kabul');
        $to = $date->date("Y-m-d", false, false);
        $data=DB::table('anouce_project')->join('registerprocurement','registerprocurement.id','anouce_project.Pro_Fid')
            ->select('anouce_project.id','anouce_project.Met_Date','registerprocurement.id as Regid','registerprocurement.Pro_Code',DB::raw("DATEDIFF(Met_Date,'$to') as day "))
            ->where('Met_Date','>=',$to)->where('met_email',0)->get();
        return response()->json($data);


    }
    public  function  Find_Eval_Date_Email()
    {
        $date = new jDateTime(true, true, 'Asia/Kabul');
        $to = $date->date("Y-m-d", false, false);
        $data=DB::table('evaluation')->join('registerprocurement','registerprocurement.id','evaluation.Pro_Fid')
            ->select('evaluation.id','evaluation.Start_Date','registerprocurement.id as Regid','registerprocurement.Pro_Code',DB::raw("DATEDIFF(Start_Date,'$to') as day "))
            ->where('Start_Date','>=',$to)->where('eval_email',0)->get();
        return response()->json($data);


    }

    public  function  Find_Contract_Date_Email()
    {
        $date = new jDateTime(true, true, 'Asia/Kabul');
        $to = $date->date("Y-m-d", false, false);
        $data=DB::table('contract')->join('registerprocurement','registerprocurement.id','contract.Pro_Fid')
            ->select('contract.id','contract.Start_Date_Contract','registerprocurement.id as Regid','registerprocurement.Pro_Code',DB::raw("DATEDIFF(Start_Date_Contract,'$to') as day "))
            ->where('Start_Date_Contract','>=',$to)->where('contract_email',0)->get();
        return response()->json($data);


    }

    public  function  Find_Extand_Date_Email()
    {
        $date = new jDateTime(true, true, 'Asia/Kabul');
        $to = $date->date("Y-m-d", false, false);
        $data=DB::table('extendproject')->join('registerprocurement','registerprocurement.id','extendproject.Pro_Fid')
            ->select('extendproject.id','extendproject.Start_Date','registerprocurement.id as Regid','registerprocurement.Pro_Code',DB::raw("DATEDIFF(Start_Date,'$to') as day "))
            ->where('Start_Date','>=',$to)->where('extand_email',0)->get();
        return response()->json($data);


    }


}
