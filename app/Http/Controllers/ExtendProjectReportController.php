<?php

namespace App\Http\Controllers;

use App\CompanyContact;
use App\ExtandProjectReprot;
use App\RegisterProcurement;
use App\Contract;
use App\ExandDetails;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use App\ExtandType;
use App\ExtandProject;
use App\ContractCompany;

use Illuminate\Support\Facades\Auth;
class ExtendProjectReportController extends Controller
{
   public  function  index($id)
   {

    $data=ExtandProject::where('id',$id)->first();
    $register_proejct=RegisterProcurement::where('id',$data->Pro_Fid)->first();

    $contract=Contract::where('Pro_Fid',$data->Pro_Fid)->first();



    $extendtype=ExtandType::all();





       return view('Extand_Project_Report.index',compact('extendtype','register_proejct','data','contract'));
   }

   public  function  store(Request $request)
   {


       if($request->hasFile('Report_File')){

           $Report_File=$request->file('Report_File');

           $Requst_Image = $Report_File->getClientOriginalName();
           $Extension = $Report_File->getClientOriginalExtension();

           $ReportFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
           $Report_File->storeAs('public/Extand_Report', $ReportFile);

       }
       else
       {
           $ReportFile='';
       }
       if($request->hasFile('Extand_File')){

           $Extand_File=$request->file('Extand_File');

           $Requst_Image = $Extand_File->getClientOriginalName();
           $Extension = $Extand_File->getClientOriginalExtension();

           $ExtandFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
           $Extand_File->storeAs('public/Extand_Report', $ExtandFile);

       }
       else
       {
           $ExtandFile='';
       }
       if($request->hasFile('Accept_File')){

           $Accept_File=$request->file('Accept_File');

           $Requst_Image = $Accept_File->getClientOriginalName();
           $Extension = $Accept_File->getClientOriginalExtension();

           $AcceptFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
           $Accept_File->storeAs('public/Extand_Report', $AcceptFile);

       }
       else
       {
           $AcceptFile='';
       }


       if($request->hasFile('Reject_File')){

           $Reject_File=$request->file('Reject_File');

           $Requst_Image = $Reject_File->getClientOriginalName();
           $Extension = $Reject_File->getClientOriginalExtension();

           $RejectFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
           $Reject_File->storeAs('public/Extand_Report', $RejectFile);

       }
       else
       {
           $RejectFile='';
       }







       $Extand_Project_Report= new ExtandProjectReprot();
        $Extand_Project_Report->Report_File =$ReportFile;
        $Extand_Project_Report->Extend_File =$ExtandFile ;
        $Extand_Project_Report->Accept_File =$AcceptFile ;
        $Extand_Project_Report->Reject_File =$RejectFile ;
        $Extand_Project_Report->Save_Date    =$request->Save_Date    ;
        $Extand_Project_Report->Req_Fid     =$request->Req_Fid     ;
       $Extand_Project_Report->Accept_Reject     =$request->Accept_Reject     ;

        $Extand_Project_Report->Extand_Name =$request->Extand_Name ;
        $Extand_Project_Report->Add_id      =Auth::user()->id   ;
        $Extand_Project_Report->Pro_Fid     =$request->Pro_Fid     ;
        $Extand_Project_Report->Details     =$request->Remarks     ;
        $Extand_Project_Report->save();
        $id=$Extand_Project_Report->id;
        if($Extand_Project_Report->save())
        {
            $rows = $request->rowmonay;
            if (isset($rows)) {

                $rows = $request->rowmonay;
                foreach ($rows as $row) {
                    $ExandDetails= new  ExandDetails();

                    $ExandDetails->Ext_Fid    =$id;
                    $ExandDetails->Pro_Fid    =$request->Pro_Fid;
                    $ExandDetails->Extand_Type=$row['Extand_Type'];
                    $ExandDetails->Req_Fid    =$row['Req_Fid'];
                    $ExandDetails->Amount     =$row['Amount'];
                    $ExandDetails->Cont_Amount=$row['Cont_Amount'];
                    $ExandDetails->Net_Amount =$row['Net_Amount'];
                    $ExandDetails->save();
                    $contract=Contract::where('Pro_Fid',$request->Pro_Fid)->first();
                    $contract->Contract_Rupee=$row['Net_Amount'];
                    $contract->Extra_Amount=$row['Amount'];
                    $contract->Old_Amount=$row['Cont_Amount'];
                    $contract->save();




                }




            }
            $rowstime = $request->rowtime;

            if (isset($rowstime)) {

                $rowstime = $request->rowtime;
                foreach ($rowstime as $row) {
                    $ExandDetails= new  ExandDetails();

                    $ExandDetails->Ext_Fid    =$id;
                    $ExandDetails->Pro_Fid    =$request->Pro_Fid;
                    $ExandDetails->Extand_Type=$row['Extand_Type'];
                    $ExandDetails->Req_Fid    =$row['Req_Fid'];
                    $ExandDetails->day     =$row['day'];
                    $ExandDetails->Cont_End_Date=$row['Cont_Date'];
                    $ExandDetails->Extand_Date =$row['Extand_Date'];

                    $ExandDetails->save();
                    $contract=Contract::where('Pro_Fid',$request->Pro_Fid)->first();
                    $contract->End_Date_Contract=$row['Extand_Date'];
                    $contract->Old_Date=$row['Cont_Date'];
                    $contract->Extand_Day=$row['day'];
                    $contract->save();



                }
            }



            $rowitem = $request->rowitem;

            if (isset($rowitem)) {

                $rowitem = $request->rowitem;
                foreach ($rowitem as $row) {
                    $ExandDetails= new  ExandDetails();

                    $ExandDetails->Ext_Fid    =$id;
                    $ExandDetails->Pro_Fid    =$request->Pro_Fid;
                    $ExandDetails->Extand_Type=$row['Extand_Type'];
                    $ExandDetails->Req_Fid    =$row['Req_Fid'];
                    $ExandDetails->item     =$row['item'];
                    $ExandDetails->quntity=$row['quntity'];


                    $ExandDetails->save();


                }
            }


            $rowextra = $request->rowextra;

            if (isset($rowextra)) {

                $rowextra = $request->rowextra;
                foreach ($rowextra as $row) {
                    $ExandDetails= new  ExandDetails();

                    $ExandDetails->Ext_Fid    =$id;
                    $ExandDetails->Pro_Fid    =$request->Pro_Fid;
                    $ExandDetails->Extand_Type=$row['Extand_Type'];
                    $ExandDetails->Req_Fid    =$row['Req_Fid'];
                    $ExandDetails->item_extra     =$row['item_extra'];
                    $ExandDetails->details_extra=$row['details_extra'];
                    $ExandDetails->save();

                }
            }

return back();


        }





   }
   public  function  List ()
   {
       $data=DB::table('registerprocurement')->join('extend_project_report', 'extend_project_report.Pro_Fid', '=', 'registerprocurement.id')

           ->select(DB::raw('count(extend_project_report.id) as total,registerprocurement.id,registerprocurement.Project_Name,registerprocurement.Pro_Code' ))
           ->groupBy('extend_project_report.Pro_Fid','registerprocurement.id','registerprocurement.Project_Name','registerprocurement.Pro_Code')->get();

       return view('Extand_Project_Report.Report_List',compact('data'));
   }
public  function  Find_Total_Extand_Report_List($id)
{

    $data=DB::table('registerprocurement')->join('extend_project_report', 'extend_project_report.Pro_Fid', '=', 'registerprocurement.id')

        ->select('extend_project_report.*','extend_project_report.id as exid','registerprocurement.id','registerprocurement.Project_Name','registerprocurement.Pro_Code' )

        ->where('extend_project_report.Pro_Fid',$id)
        ->get();

    return view('Extand_Project_Report.Extand_Report_List2',compact('data'));

}
public  function  View($id)
{

    $data=ExtandProjectReprot::where('id',$id)->first();

    $contract=Contract::where('Pro_Fid',$data->Pro_Fid)->first();

    $Company=ContractCompany::where('Con_Fid',$contract->id)->first();
    $datatime=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',2)->get();
    $datamonay=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',1)->get();
    $dataitem=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',3)->get();
    $dataextra=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',4)->get();

    return view('Extand_Project_Report.view_Extand_Details',compact('data','datatime','dataextra','dataitem','datamonay','contract','Company'));


}

public  function  Print($id)
{
    $data=ExtandProjectReprot::where('id',$id)->first();
    $datatime=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',2)->get();
    $datamonay=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',1)->get();
    $dataitem=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',3)->get();
    $dataextra=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',4)->get();

    return view('Extand_Project_Report.Print_Extand_Details',compact('data','datatime','dataextra','dataitem','datamonay'));

}

public  function  Edit($id)
{

    $data=ExtandProjectReprot::where('id',$id)->first();

    $register_proejct=RegisterProcurement::where('id',$data->Pro_Fid)->first();

    $contract=Contract::where('Pro_Fid',$data->Pro_Fid)->first();


    $register_proejct=RegisterProcurement::where('id',$data->Pro_Fid)->first();

    $datatime=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',2)->get();
    $datamonay=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',1)->get();
    $dataitem=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',3)->get();

    $dataextra=ExandDetails::where('Ext_Fid',$data->id)->where('Extand_Type',4)->get();

    return view('Extand_Project_Report.Details_Edit',compact('data','datatime','dataextra','dataitem','datamonay','register_proejct','contract'));
}

public  function  Delete_Moany(Request $request)
{
    $data=ExandDetails::find($request->id);
    if($data->delete())
    {
        return response()->json($data);

    }

}

    public  function  Delete_Time(Request $request)
    {
        $data=ExandDetails::find($request->id);
        if($data->delete())
        {
            return response()->json($data);

        }

    }

public  function  Update(Request $request)
{


    if($request->hasFile('Report_File')){

        $Report_File=$request->file('Report_File');

        $Requst_Image = $Report_File->getClientOriginalName();
        $Extension = $Report_File->getClientOriginalExtension();

        $ReportFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
        $Report_File->storeAs('public/Extand_Report', $ReportFile);

    }
    else
    {
        $ReportFile=$request->ReportFile;
    }
    if($request->hasFile('Extand_File')){

        $Extand_File=$request->file('Extand_File');

        $Requst_Image = $Extand_File->getClientOriginalName();
        $Extension = $Extand_File->getClientOriginalExtension();

        $ExtandFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
        $Extand_File->storeAs('public/Extand_Report', $ExtandFile);

    }
    else
    {
        $ExtandFile=$request->ExtandFile;
    }
    if($request->hasFile('Accept_File')){

        $Accept_File=$request->file('Accept_File');

        $Requst_Image = $Accept_File->getClientOriginalName();
        $Extension = $Accept_File->getClientOriginalExtension();

        $AcceptFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
        $Accept_File->storeAs('public/Extand_Report', $AcceptFile);

    }
    else
    {
        $AcceptFile=$request->AcceptFile;
    }


    if($request->hasFile('Reject_File')){

        $Reject_File=$request->file('Reject_File');

        $Requst_Image = $Reject_File->getClientOriginalName();
        $Extension = $Reject_File->getClientOriginalExtension();

        $RejectFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
        $Reject_File->storeAs('public/Extand_Report', $RejectFile);

    }
    else
    {
        $RejectFile=$request->RejectFile;
    }







    $Extand_Project_Report= ExtandProjectReprot::where('id',$request->id)->first();
    $Extand_Project_Report->Report_File =$ReportFile;
    $Extand_Project_Report->Extend_File =$ExtandFile ;
    $Extand_Project_Report->Accept_File =$AcceptFile ;
    $Extand_Project_Report->Reject_File =$RejectFile ;
    $Extand_Project_Report->Save_Date    =$request->Save_Date    ;
    $Extand_Project_Report->Req_Fid     =$request->Req_Fid     ;
    $Extand_Project_Report->Accept_Reject     =$request->Accept_Reject     ;
    $Extand_Project_Report->Extand_Name =$request->Extand_Name ;
    $Extand_Project_Report->Add_id      =Auth::user()->id   ;
    $Extand_Project_Report->Pro_Fid     =$request->Pro_Fid     ;
    $Extand_Project_Report->Details     =$request->Remarks     ;
    $Extand_Project_Report->save();
    $id=$Extand_Project_Report->id;
    if($Extand_Project_Report->save())
    {
        $rows = $request->rowmonay;
        if (isset($rows)) {

            $rows = $request->rowmonay;
            foreach ($rows as $row) {
                $ExandDetails= new  ExandDetails();

                $ExandDetails->Ext_Fid    =$id;
                $ExandDetails->Pro_Fid    =$request->Pro_Fid;
                $ExandDetails->Extand_Type=$row['Extand_Type'];
                $ExandDetails->Req_Fid    =$row['Req_Fid'];
                $ExandDetails->Amount     =$row['Amount'];
                $ExandDetails->Cont_Amount=$row['Cont_Amount'];
                $ExandDetails->Net_Amount =$row['Net_Amount'];
                $ExandDetails->save();
                $contract=Contract::where('Pro_Fid',$request->Pro_Fid)->first();
                $contract->Contract_Rupee=$row['Net_Amount'];
                $contract->Extra_Amount=$row['Amount'];
                $contract->Old_Amount=$row['Cont_Amount'];
                $contract->save();




            }




        }
        $rowstime = $request->rowtime;

        if (isset($rowstime)) {

            $rowstime = $request->rowtime;
            foreach ($rowstime as $row) {
                $ExandDetails= new  ExandDetails();

                $ExandDetails->Ext_Fid    =$id;
                $ExandDetails->Pro_Fid    =$request->Pro_Fid;
                $ExandDetails->Extand_Type=$row['Extand_Type'];
                $ExandDetails->Req_Fid    =$row['Req_Fid'];
                $ExandDetails->day     =$row['day'];
                $ExandDetails->Cont_End_Date=$row['Cont_Date'];
                $ExandDetails->Extand_Date =$row['Extand_Date'];
                $ExandDetails->save();
                $contract=Contract::where('Pro_Fid',$request->Pro_Fid)->first();
                $contract->End_Date_Contract=$row['Extand_Date'];
                $contract->Old_Date=$row['Cont_Date'];
                $contract->Extand_Day=$row['day'];
                $contract->save();



            }
        }



        $rowitem = $request->rowitem;

        if (isset($rowitem)) {

            $rowitem = $request->rowitem;

            foreach ($rowitem as $row) {
                $ExandDetails= new  ExandDetails();

                $ExandDetails->Ext_Fid    =$id;
                $ExandDetails->Pro_Fid    =$request->Pro_Fid;
                $ExandDetails->Extand_Type=$row['Extand_Type'];
                $ExandDetails->Req_Fid    =$row['Req_Fid'];
                $ExandDetails->item     =$row['item'];
                $ExandDetails->quntity=$row['quntity'];


                $ExandDetails->save();


            }
        }


        $rowextra = $request->rowextra;

        if (isset($rowextra)) {

            $rowextra = $request->rowextra;
            foreach ($rowextra as $row) {
                $ExandDetails= new  ExandDetails();

                $ExandDetails->Ext_Fid    =$id;
                $ExandDetails->Pro_Fid    =$request->Pro_Fid;
                $ExandDetails->Extand_Type=$row['Extand_Type'];
                $ExandDetails->Req_Fid    =$row['Req_Fid'];
                $ExandDetails->item_extra     =$row['item_extra'];
                $ExandDetails->details_extra=$row['details_extra'];
                $ExandDetails->save();

            }
        }

        return back();


    }





}



}
