<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paymant;
use App\RegisterProcurement;
use Illuminate\Support\Facades\DB;
use App\Invoicetype;
use Illuminate\Support\Facades\Auth;
use App\Subpaymant;

use App\CompleteProject;
class PaymantController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->get();


        $Invoicetype = Invoicetype::orderBy('id', 'asc')->get();
        return view('Paymant.index', compact('register_project', 'Invoicetype','data'));
    }

    public  function  Edit($id)
    {


        $data=Paymant::find($id);




            $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')->where('registerprocurement.reject_id',0)
                ->where('registerprocurement.id',$data->Pro_Fid)->get();


            return view('Paymant.Edit',compact('data','register_project'));




    }




    public function store(Request $request)
    {


        $paymant = new Paymant();

        $paymant->Qunity = $request->Qunity;
        $paymant->Unit_Price = $request->Unit_Price;
        $paymant->Amount = $request->Amount;
        $paymant->Total_Price = $request->Total_Price;
        $paymant->Discount = $request->Discount;
        $paymant->Price_Distcount = $request->Price_Distcount;
        $paymant->Details = $request->Details;
        $paymant->Save_Date = $request->Save_Date;
        $paymant->Pro_Fid = $request->Pro_Fid;

        $paymant->Add_id = Auth::user()->id;

        $paymant->save();

        if ($paymant->save())
        {

            return json_encode(array(
                "statusCode"=>200));
        }


    }
public  function  Update(Request $request)
{

    $paymant=Paymant::find($request->id);
    $paymant->Qunity = $request->Qunity;
    $paymant->Unit_Price = $request->Unit_Price;
    $paymant->Amount = $request->Amount;
    $paymant->Total_Price = $request->Total_Price;
    $paymant->Discount = $request->Discount;
    $paymant->Price_Distcount = $request->Price_Distcount;
    $paymant->Details=$request->Details;
    $paymant->Save_Date = $request->Save_Date;
    $paymant->Pro_Fid = $request->Pro_Fid;

    $paymant->Add_id = Auth::user()->id;

    $paymant->save();

    if ($paymant->save())
    {

        return json_encode(array(
            "statusCode"=>200));
    }
}

    public function  List()
    {

        $data = DB::table('registerprocurement')->join('paymant', 'paymant.Pro_Fid', '=', 'registerprocurement.id')
            ->select(DB::raw('count(paymant.id) as total,registerprocurement.id,registerprocurement.Project_Name,registerprocurement.Pro_Code'))
            ->groupBy('paymant.Pro_Fid', 'registerprocurement.id', 'registerprocurement.Project_Name', 'registerprocurement.Pro_Code')->paginate();


        $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)
            ->get();
        $Invoicetype = Invoicetype::orderBy('id', 'asc')->get();

        return view('Paymant.List', compact('data', 'register_project','Invoicetype'));

    }

    public function View($id)
    {

        $Project_Name = RegisterProcurement::where('id', $id)->first();

        $data = Paymant::where('Pro_Fid', $id)->get();
        return view('Paymant.view', compact('data', 'Project_Name'));

    }

    public function Find_Paymant(Request $request)
    {

        $data = Paymant::where('Pro_Fid', $request->Pro_Fid)->get();
        $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')->get();

        return view('Paymant.List', compact('data', 'register_project'));

    }




    public function View_Sub_Paymant($id)
    {
        $Invoicetype = Invoicetype::orderBy('id', 'asc')->get();

        $data = Paymant::where('id', $id)->first();


return view('Subpaymant.index',compact('Invoicetype','data'));

    }


    public  function  Add_Sub_Paymant(Request $request)
    {



            $SubPaymant= new Subpaymant();

            $SubPaymant->Pro_Fid   =$request->Pro_Fid;
            $SubPaymant->Inv_Type_Fid   =$request->Inv_Type_Fid   ;
            $SubPaymant->Inv_unit       =$request->Inv_unit       ;
            $SubPaymant->Inv_T_Price    =$request->Inv_T_Price    ;
            $SubPaymant->Inv_P_Distcount=$request->Inv_P_Distcount;
            $SubPaymant->Add_id         =Auth::user()->id       ;
            $SubPaymant->Pay_Fid        =$request->Pay_Fid        ;
            $SubPaymant->save();
            if($SubPaymant->save())
            {
                return json_encode(array(
                    "statusCode"=>200));
                //return response()->json($request->all());
            }





    }

    public  function  View_Tracker()
    {
        $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')->get();

        return view('Subpaymant.Good_Track',compact('register_project'));
    }

    public  function Find_Track(Request $request)
    {

        $data = Paymant::where('Pro_Fid', $request->Pro_Fid)->get();
        $regisger_project=RegisterProcurement::where('id',$request->Pro_Fid)->first();
        $Find_max=Subpaymant::where('Pro_Fid',$request->Pro_Fid)->max('Inv_Type_Fid');


        return view('Subpaymant.view',compact('data','Find_max','regisger_project'));

    }

}
