<?php

namespace App\Http\Controllers;

use App\ContractCompany;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use App\ExtandType;
use App\Crime;
use App\Contract;
use App\RegisterProcurement;
class CrimeController extends Controller
{
    public  function  index()
    {
        $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->get();

        $extendtype=ExtandType::all();

        return view('crime.index',compact('extendtype','register_project'));
    }
    public  function  store(Request $request)
    {


        if($request->hasFile('Order_File')){

            $Order_File=$request->file('Order_File');

            $Basic = $Order_File->getClientOriginalName();
            $Extension = $Order_File->getClientOriginalExtension();

            $OrderFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
            $Order_File->storeAs('public/crime', $OrderFile);

        }
        else
        {
            $OrderFile='';
        }







       $Crime= new Crime();

        $Crime-> Name         =$request->Name        ;
        $Crime->Pro_Fid      =$request->Pro_Fid     ;
        $Crime->Save_Date    =$request->Save_Date   ;
        $Crime->Contract_Rupee=$request->Contract_Rupee;
        $Crime->Order_File   =$OrderFile ;
        $Crime->crime   =$request->crime;
        $Crime->day          =$request->day         ;
        $Crime->Amount       =$request->Amount      ;
        $Crime->remark       =$request->remark      ;
$Crime->save();

if($Crime->save())
{
    return redirect()->action('CrimeController@List')->with('msg','معلومات شما ثپت شد');

}







    }



    public  function  List()
    {
        $data=DB::table('registerprocurement')->join('crime', 'crime.Pro_Fid', '=', 'registerprocurement.id')

            ->select(DB::raw('count(crime.id) as total,registerprocurement.id,registerprocurement.Project_Name,registerprocurement.Pro_Code' ))
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)
            ->groupBy('crime.Pro_Fid','registerprocurement.id','registerprocurement.Project_Name','registerprocurement.Pro_Code')->orderBy('id','desc')->get();


        return view('crime.List',compact('data'));

    }
    public  function  View($id)
    {

        $data=Crime::where('Pro_Fid',$id)->get();


        $project=RegisterProcurement::where('id',$id)->first();
        $contract=Contract::where('Pro_Fid',$id)->first();

        $Company=ContractCompany::where('Con_Fid',$contract->id)->first();



        return view('crime.view',compact('data','project','Company','contract'));

    }


    public  function  Print($id)
    {

        $data=Crime::where('Pro_Fid',$id)->get();

        $project=RegisterProcurement::where('id',$id)->first();
        $contract=Contract::where('Pro_Fid',$id)->first();
           $Company=ContractCompany::where('Con_Fid',$contract->id)->first();

        return view('crime.print',compact('data','project','Company','contract'));

    }




    public  function  Edit($id)
    {
        $data=Crime::where('id',$id)->first();
        $contract=Contract::where('Pro_Fid',$data->Pro_Fid)->first();


        $register_project=RegisterProcurement::where('id',$data->Pro_Fid)->get();

return view('crime.Edit',compact('data','register_project','contract'));
    }

    public  function  Update(Request $request)
    {


        if($request->hasFile('Order_File')){

            $Order_File=$request->file('Order_File');

            $Basic = $Order_File->getClientOriginalName();
            $Extension = $Order_File->getClientOriginalExtension();

            $OrderFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
            $Order_File->storeAs('public/crime', $OrderFile);

        }
        else
        {
            $OrderFile=$request->OrderFile;
        }







        $Crime=Crime::find($request->id);

        $Crime-> Name         =$request->Name        ;
        $Crime->Pro_Fid      =$request->Pro_Fid     ;
        $Crime->Save_Date    =$request->Save_Date   ;
        $Crime->Contract_Rupee=$request->Contract_Rupee;
        $Crime->Order_File   =$OrderFile ;
        $Crime->crime   =$request->crime;
        $Crime->day          =$request->day         ;
        $Crime->Amount       =$request->Amount      ;
        $Crime->remark       =$request->remark      ;
        $Crime->save();

        if($Crime->save())
        {
            return redirect()->action('CrimeController@List')->with('msg','معلومات شما تغیر شد');

        }


    }


}
