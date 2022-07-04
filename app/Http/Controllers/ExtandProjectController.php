<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\ExtandType;
use App\ExtandProject;
use App\AounceProjectMemberList;
use App\ContractCompany;
use App\Process;
use App\CompleteProject;

class ExtandProjectController extends Controller
{
   public  function  index()
   {


       $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')
           ->where('registerprocurement.is_complete',0)
           ->where('registerprocurement.reject_id',0)->get();

       $extendtype=ExtandType::all();

       return view('Extand_Project.index',compact('register_project','extendtype'));
   }

public  function List()
{
    $data=DB::table('registerprocurement')->join('extendproject', 'extendproject.Pro_Fid', '=', 'registerprocurement.id')

        ->select(DB::raw('count(extendproject.id) as total,registerprocurement.id,registerprocurement.Project_Name,registerprocurement.Pro_Code' ))
        ->groupBy('extendproject.Pro_Fid','registerprocurement.id','registerprocurement.Project_Name','registerprocurement.Pro_Code')->get();
    return view('Extand_Project.List',compact('data'));


}



public  function  Print($id)
{

    $data=ExtandProject::find($id)->first();
    $conctract=Contract::where('Pro_Fid',$data->Pro_Fid)->first();
    $contractcompany=ContractCompany::where('Con_Fid',$conctract->id)->first();
    $Member_List=AounceProjectMemberList::where('Ext_Fid',$data->id)->get();

    return view('Extand_Project.print',compact('data','contractcompany','Member_List'));

}






public  function  View($id)
{

    $data=ExtandProject::where('Pro_Fid',$id)->get();



    return view('Extand_Project.view',compact('data','contract','Company'));
}





public  function  Edit($id)
{
    $data=ExtandProject::find($id);



        $register_project = DB::table('registerprocurement')->join('contract', 'contract.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')

          ->where('registerprocurement.id',$data->Pro_Fid)->get();




        $Team_Contact_List=AounceProjectMemberList::where('Ext_Fid',$data->id)->get();



        return view('Extand_Project.Edit',compact('register_project','data','Team_Contact_List'));


}



public  function  Update(Request $request)
{

    if($request->hasFile('Request_File')){

        $Request_File=$request->file('Request_File');

        $Requst_Image = $Request_File->getClientOriginalName();
        $Extension = $Request_File->getClientOriginalExtension();

        $RequestFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
        $Request_File->storeAs('public/Extand', $RequestFile);

    }
    else
    {
        $RequestFile=$request->RequestFile;
    }
    if($request->hasFile('Report_File')){

        $Report_File=$request->file('Report_File');

        $Basic = $Report_File->getClientOriginalName();
        $Extension = $Report_File->getClientOriginalExtension();

        $ReportFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
        $Report_File->storeAs('public/Extand', $ReportFile);

    }
    else
    {
        $ReportFile=$request->ReportFile;
    }

    if($request->hasFile('Extend_File')){

        $Extend_File=$request->file('Extend_File');

        $Attribute = $Extend_File->getClientOriginalName();
        $Extension = $Extend_File->getClientOriginalExtension();

        $ExtendFile =  $Attribute.date('mdYHis') . uniqid().'.'.$Extension;
        $Extend_File->storeAs('public/Exand', $ExtendFile);

    }
    else
    {
        $ExtendFile=$request->ExtendFile;
    }


    $ExtandProject= ExtandProject::find($request->id);
    $ExtandProject-> Pro_Fid  =$request->Pro_Fid      ;
    $ExtandProject->  Name  =$request-> Remarks        ;
    $ExtandProject->  Start_Date =$request-> Start_Date        ;
    $ExtandProject->  End_Date    =$request-> End_Date   ;
    $ExtandProject->Ext_Fid=$request->Ext_Fid     ;
    $ExtandProject-> Req_Fid =$request->Req_Fid     ;


    $ExtandProject->extand_email=0;
    $ExtandProject->ext_10=0;
    $ExtandProject->ext_15=0;
    $ExtandProject->ext_20=0;
    $ExtandProject->ext_30=0;


    $ExtandProject->place =$request->place     ;
    $ExtandProject->time =$request->time     ;
    $ExtandProject->  Request_File =$RequestFile;
    $ExtandProject->  Report_File  =$ReportFile ;
    $ExtandProject->  Extend_File  = $ExtendFile ;
    $ExtandProject->  Add_id       =Auth::user()->id    ;

    if($ExtandProject->save())
    {


        $rows = $request->rows;
        if(isset($rows))
        {
            foreach ($rows as $row) {
                $List = new AounceProjectMemberList();


                $List->Emp_Code = $row['EmpCode'];
                $List->Phone = $row['Mobile'];
                $List->Emp_Name=$row['Name'];
                $List->Email = $row['Email'];
                $List->Send_Type =4;
                $List->Ext_Fid = $ExtandProject->id;
                $List->save();
            }
        }
    }



    return redirect()->action('ExtandProjectController@List')->with('msg','معلومات شما ثپت شد');



}



   public  function  store(Request $request)
   {


       if($request->hasFile('Request_File')){

           $Request_File=$request->file('Request_File');

           $Requst_Image = $Request_File->getClientOriginalName();
           $Extension = $Request_File->getClientOriginalExtension();

           $RequestFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
           $Request_File->storeAs('public/Extand', $RequestFile);

       }
       else
       {
           $RequestFile='';
       }
       if($request->hasFile('Report_File')){

           $Report_File=$request->file('Report_File');

           $Basic = $Report_File->getClientOriginalName();
           $Extension = $Report_File->getClientOriginalExtension();

           $ReportFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
           $Report_File->storeAs('public/Extand', $ReportFile);

       }
       else
       {
           $ReportFile='';
       }

       if($request->hasFile('Extend_File')){

           $Extend_File=$request->file('Extend_File');

           $Attribute = $Extend_File->getClientOriginalName();
           $Extension = $Extend_File->getClientOriginalExtension();

           $ExtendFile =  $Attribute.date('mdYHis') . uniqid().'.'.$Extension;
           $Extend_File->storeAs('public/Exand', $ExtendFile);

       }
       else
       {
           $ExtendFile='';
       }


       $ExtandProject= new ExtandProject();
      $ExtandProject-> Pro_Fid =$request->Pro_Fid      ;
      $ExtandProject->Name =$request->Remarks        ;
      $ExtandProject->Start_Date=$request->Start_Date        ;
      $ExtandProject->End_Date =$request->End_Date   ;
      $ExtandProject->Ext_Fid =$request-> Ext_Fid     ;
       $ExtandProject->Req_Fid =$request->Req_Fid     ;
       $ExtandProject->place =$request-> place     ;
       $ExtandProject->time =$request->time     ;

      $ExtandProject->  Request_File =$RequestFile;
      $ExtandProject->  Report_File  =$ReportFile ;
      $ExtandProject->  Extend_File  = $ExtendFile ;
      $ExtandProject->  Add_id       =Auth::user()->id    ;

if($ExtandProject->save())
{
    $process= new Process();
    $process->Pro_Fid=$request->Pro_Fid;

    $process->tblnanme="extandproject";
    $process->Name="پروژه حالت دربخش تعدیلات هست";
    $process->save();

    $rows = $request->rows;
    if(isset($rows))
    {
        foreach ($rows as $row) {
            $List = new AounceProjectMemberList();


            $List->Emp_Code = $row['EmpCode'];
            $List->Phone = $row['Mobile'];
            $List->Emp_Name=$row['Name'];
            $List->Email = $row['Email'];
            $List->Send_Type =4;
            $List->Ext_Fid = $ExtandProject->id;
            $List->save();
        }
    }
}



       return redirect()->action('ExtandProjectController@List')->with('msg','معلومات شما تغیر شد');





   }


}
