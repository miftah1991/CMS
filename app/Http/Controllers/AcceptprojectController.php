<?php

namespace App\Http\Controllers;

use App\RegisterProcurement;
use App\RejectProject;
use App\Statustype;
use Illuminate\Http\Request;
use App\Acceptproject;


class AcceptprojectController extends Controller
{

public  function index($id)
{

$data=RejectProject::where('id',$id)->first();

    $register=RegisterProcurement::find($data->Pro_Fid)->first();
    $statustype=Statustype::all();
    return view('Accept_Project.index',compact('data','register','statustype'));



}

public  function  store(Request $request)
{

    if($request->hasFile('Request_File')){

        $Request_File=$request->file('Request_File');

        $Requst_Image = $Request_File->getClientOriginalName();
        $Extension = $Request_File->getClientOriginalExtension();

        $RequestFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
        $Request_File->storeAs('public/AcceptProject', $RequestFile);

    }
    else
    {
        $RequestFile='';

    }
    if($request->hasFile('Order_File')){

        $Order_File=$request->file('Order_File');

        $Basic = $Order_File->getClientOriginalName();
        $Extension = $Order_File->getClientOriginalExtension();

        $OrderFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
        $Order_File->storeAs('public/AcceptProject', $OrderFile);

    }
    else
    {
        $OrderFile='';
    }


$AcceptProject = new Acceptproject();

    $AcceptProject->Rej_Fid       =$request->id     ;
    $AcceptProject->Pro_Fid       =$request->Pro_Fid     ;
    $AcceptProject->Accept_Date   =$request->Accept_Date ;
    $AcceptProject->Stat_Fid      =$request->Stat_Fid    ;
    $AcceptProject->Order_File    =$OrderFile ;
    $AcceptProject->Request_File  =$RequestFile;
    $AcceptProject->Remarks       =$request->Remarks     ;
    if($AcceptProject->save())

    {

        $RegisterProcurement=RegisterProcurement::find($request->Pro_Fid);
        $RegisterProcurement->reject_id=0;
        $RegisterProcurement->save();

        $RejectProject=RejectProject::where('id',$request->id)->first();

        $RejectProject->again_stat=1;
        $RejectProject->save();
        return redirect()->action('AcceptprojectController@List')->with('msg','معلومات شما ثپت دی');

    }



}


public  function  List()
{

    $data=Acceptproject::all();
    return view('Accept_Project.List',compact('data'));


}

public  function  Edit($id)
{

    $data=Acceptproject::find($id);

    $register=RegisterProcurement::find($data->Pro_Fid)->first();
    $statustype=Statustype::all();
    return view('Accept_Project.Edit',compact('data','register','statustype'));
}
public  function  Update(Request $request)
{


    if($request->hasFile('Request_File')){

        $Request_File=$request->file('Request_File');

        $Requst_Image = $Request_File->getClientOriginalName();
        $Extension = $Request_File->getClientOriginalExtension();

        $RequestFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
        $Request_File->storeAs('public/AcceptProject', $RequestFile);

    }
    else
    {
        $RequestFile=$request->RequestFile;

    }
    if($request->hasFile('Order_File')){

        $Order_File=$request->file('Order_File');

        $Basic = $Order_File->getClientOriginalName();
        $Extension = $Order_File->getClientOriginalExtension();

        $OrderFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
        $Order_File->storeAs('public/AcceptProject', $OrderFile);

    }
    else
    {
        $OrderFile=$request->OrderFile;
    }


    $AcceptProject = Acceptproject::find($request->id)->first();

    $AcceptProject->Rej_Fid       =$request->Rej_Fid    ;
    $AcceptProject->Pro_Fid       =$request->Pro_Fid     ;
    $AcceptProject->Accept_Date   =$request->Accept_Date ;
    $AcceptProject->Stat_Fid      =$request->Stat_Fid    ;
    $AcceptProject->Order_File    =$OrderFile ;
    $AcceptProject->Request_File  =$RequestFile;
    $AcceptProject->Remarks       =$request->Remarks     ;
    if($AcceptProject->save())

    {

        $RegisterProcurement=RegisterProcurement::find($request->Pro_Fid);
        $RegisterProcurement->reject_id=0;
        $RegisterProcurement->save();

        $RejectProject=RejectProject::find($request->Rej_Fid)->first();
        $RejectProject->again_stat=1;
        $RejectProject->save();
        return redirect()->action('AcceptprojectController@List')->with('msg','معلومات شما تغیر دی');

    }




}

public  function  View($id)
{
    $data=Acceptproject::find($id);
    return view('Accept_Project.view',compact('data'));

}

}
