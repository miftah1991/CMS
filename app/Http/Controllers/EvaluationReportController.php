<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisterProcurement;
use App\Process;
use App\RejectProject;
use Illuminate\Support\Facades\DB;
use App\Statustype;
use App\EvaluationReport;
use Illuminate\Support\Facades\Auth;




class EvaluationReportController extends Controller
{
    public  function  index()
    {

        $register_project=DB::table('registerprocurement')->join('offercompany','offercompany.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->get();


        $statustype=Statustype::all();



        return view('Evaluation_Report.index',compact('statustype','register_project'));

    }
    public  function  store(Request $request)
    {







if($request->Stat_Fid==1) {

    if($request->hasFile('Reject_Report_File'))
    {

        $Reject_Report_File=$request->file('Reject_Report_File');
        $Requst_Image = $Reject_Report_File->getClientOriginalName();
        $Extension = $Reject_Report_File->getClientOriginalExtension();
        $RejectReportFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;

        $Reject_Report_File->storeAs('public/Eval_Files', $RejectReportFile);

    }
    else
    {
        $RejectReportFile='';
    }


    if($request->hasFile('Accept_File'))
    {

        $Accept_File=$request->file('Accept_File');
        $Requst_Image = $Accept_File->getClientOriginalName();
        $Extension = $Accept_File->getClientOriginalExtension();
        $AcceptFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;

        $Accept_File->storeAs('public/Eval_Files', $AcceptFile);

    }

    else
    {
        $AcceptFile='';
    }

    if($request->hasFile('Request_File'))
    {


        $Request_File=$request->file('Request_File');
        $Requst_Image = $Request_File->getClientOriginalName();
        $Extension = $Request_File->getClientOriginalExtension();
        $RequestFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
        $Request_File->storeAs('public/Eval_Files', $RequestFile);

    }

    else
    {
        $Request_File='';
    }

    $Report = new EvaluationReport();

    $Report->Save_Date = $request->Date_Reject;
    $Report->Pro_Fid = $request->Pro_Fid;
    $Report->Stat_Fid = $request->Stat_Fid;
    $Report->Report_File = $RejectReportFile;
    $Report->Accept_File = $AcceptFile;
    $Report->Request_File = $Request_File;
    $Report->is_reject =1;
    $Report->Remarks = $request->Remarks;
    $Report->Add_id = Auth::user()->id;
    $Report->save();
    if($Report->save())
    {

        $rejisterporject=RegisterProcurement::find($request->Pro_Fid);
        $rejisterporject->reject_id=0;
        $rejisterporject->save();


        $process= new Process();
        $process->Pro_Fid=$request->Pro_Fid;
        $process->tblnanme="rejisterporject";
        $process->Name="قرارداد حالت راپور ارزیابی شد";

        $process->save();
        return  redirect()->action('EvaluationReportController@List')->with('ms','معلومات شما ثپت شد');
    }
}


//This section for reject project

    else

    {



        if($request->hasFile('Reject_File')){

            $Reject_File=$request->file('Reject_File');

            $Basic = $Reject_File->getClientOriginalName();
            $Extension = $Reject_File->getClientOriginalExtension();

            $RejectFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
            $Reject_File->storeAs('public/Reject', $RejectFile);

        }
        else
        {
            $RejectFile='';
        }
        if($request->hasFile('Reject_Report_File')){

            $Reject_Report_File=$request->file('Reject_Report_File');
            $Requst_Image = $Reject_Report_File->getClientOriginalName();
            $Extension = $Reject_Report_File->getClientOriginalExtension();
            $RejectReportFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Reject_Report_File->storeAs('public/Eval_Files', $RejectReportFile);
            $Reject_Report_File->storeAs('public/Reject', $RejectReportFile);
        }
        else
        {
            $RejectReportFile='';
        }


        if($request->hasFile('Request_File'))
        {


            $Request_File=$request->file('Request_File');
            $Requst_Image = $Request_File->getClientOriginalName();
            $Extension = $Request_File->getClientOriginalExtension();
            $RequestFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Request_File->storeAs('public/Reject', $RequestFile);

        }

        else
        {
            $RequestFile='';
        }









        $RegisterProcurement=RegisterProcurement::find($request->Pro_Fid);
        $RegisterProcurement->reject_id=1;
        $RegisterProcurement->save();
        if($RegisterProcurement->save())
        {
            $RejectProject= new RejectProject();
            $RejectProject->Pro_Fid    =$request->Pro_Fid   ;
            $RejectProject->Stat_Fid   =$request->Stat_Fid   ;
            $RejectProject->Remarks    =$request->Remarks    ;
            $RejectProject->Date_Reject=$request->Date_Reject;
            $RejectProject->reject_status=1;
            $RejectProject->Reject_File=$RejectFile;
            $RejectProject->Report_File=$RejectReportFile;
            $RejectProject->Report_File=$RejectReportFile;
            $RejectProject->Request_File=$RequestFile;
            $RejectProject->save();
        }

        return redirect()->action('RejectProjectController@List')->with('msg','معلومات شما ثپت شد');

    }

}

public  function  List()
{

$data=EvaluationReport::orderBy('id','desc')->where('is_reject',1)->get();

return view('Evaluation_Report.List',compact('data'));
}

public  function  List_Evaluation_Reject_Report()
{
    $data=RejectProject::orderBy('id','desc')->where('Stat_Fid',4)->get();

    return view('Reject_Project.List',compact('data'));

}


public  function  Find_Eval_Report_Duplicate(Request $request)
{
    $data=EvaluationReport::where('Pro_Fid',$request->id)->get();
    return response()->json($data);

}


public  function  Edit($id)
{

 $data=EvaluationReport::find($id)->first();
    $statustype=Statustype::all();
    $register_project=RegisterProcurement::where('id',$data->Pro_Fid)->get();



    return view('Evaluation_Report.Edit',compact('data','statustype','register_project'));

}
public  function  View($id)
{
    $data=EvaluationReport::find($id)->first();

    return view('Evaluation_Report.view',compact('data'));
}


//update
public  function  Update(Request $request)
{



    if($request->Stat_Fid==1) {

        if ($request->hasFile('Reject_Report_File')) {

            $Reject_Report_File = $request->file('Reject_Report_File');
            $Requst_Image = $Reject_Report_File->getClientOriginalName();
            $Extension = $Reject_Report_File->getClientOriginalExtension();
            $RejectReportFile = $Requst_Image . date('mdYHis') . uniqid() . '.' . $Extension;

            $Reject_Report_File->storeAs('public/Eval_Files', $RejectReportFile);

        }
        else {
            $RejectReportFile = $request->RejectReportFile;
        }


        if ($request->hasFile('Accept_File')) {

            $Accept_File = $request->file('Accept_File');
            $Requst_Image = $Accept_File->getClientOriginalName();
            $Extension = $Accept_File->getClientOriginalExtension();
            $AcceptFile = $Requst_Image . date('mdYHis') . uniqid() . '.' . $Extension;

            $Accept_File->storeAs('public/Eval_Files', $AcceptFile);

        }
        else {
            $AcceptFile = $request->AcceptFile;
        }

        if ($request->hasFile('Request_File')) {


            $Request_File = $request->file('Request_File');
            $Requst_Image = $Request_File->getClientOriginalName();
            $Extension = $Request_File->getClientOriginalExtension();
            $RequestFile = $Requst_Image . date('mdYHis') . uniqid() . '.' . $Extension;
            $Request_File->storeAs('public/Eval_Files', $RequestFile);

        } else {
            $RequestFile = $request->RequestFile;
        }

        $Report = EvaluationReport::find($request->id);

        $Report->Save_Date = $request->Date_Reject;
        $Report->Pro_Fid = $request->Pro_Fid;
        $Report->Stat_Fid = $request->Stat_Fid;
        $Report->Report_File = $RejectReportFile;
        $Report->Accept_File = $AcceptFile;
        $Report->Request_File = $RequestFile;
        $Report->is_reject = 1;
        $Report->Remarks = $request->Remarks;
        $Report->Add_id = Auth::user()->id;
        $Report->save();
        if ($Report->save()) {

            $rejisterporject = RegisterProcurement::find($request->Pro_Fid);
            $rejisterporject->reject_id = 0;
            $rejisterporject->save();


            return redirect()->action('EvaluationReportController@List')->with('ms', 'معلومات شما ثپت شد');
        }


    }

    //this section for reject update

    else

    {


        if ($request->hasFile('Accept_File')) {

            $Accept_File = $request->file('Accept_File');
            $Requst_Image = $Accept_File->getClientOriginalName();
            $Extension = $Accept_File->getClientOriginalExtension();
            $AcceptFile = $Requst_Image . date('mdYHis') . uniqid() . '.' . $Extension;

            $Accept_File->storeAs('public/Eval_Files', $AcceptFile);

        }
        else {
            $AcceptFile = $request->AcceptFile;
        }

        if ($request->hasFile('Reject_Report_File')) {

            $Reject_Report_File = $request->file('Reject_Report_File');
            $Requst_Image = $Reject_Report_File->getClientOriginalName();
            $Extension = $Reject_Report_File->getClientOriginalExtension();
            $RejectReportFile = $Requst_Image . date('mdYHis') . uniqid() . '.' . $Extension;

            $Reject_Report_File->storeAs('public/Reject', $RejectReportFile);

        } else {
            $RejectReportFile = $request->RejectReportFile;
        }

        if ($request->hasFile('Request_File')) {


            $Request_File = $request->file('Request_File');
            $Requst_Image = $Request_File->getClientOriginalName();
            $Extension = $Request_File->getClientOriginalExtension();
            $RequestFile = $Requst_Image . date('mdYHis') . uniqid() . '.' . $Extension;
            $Request_File->storeAs('public/Reject', $RequestFile);

        } else {
            $RequestFile = $request->RequestFile;
        }

        if($request->hasFile('Reject_File')){

            $Reject_File=$request->file('Reject_File');

            $Requst_Image = $Reject_File->getClientOriginalName();
            $Extension = $Reject_File->getClientOriginalExtension();

            $RejectFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Reject_File->storeAs('public/Reject', $RejectFile);

        }
        else
        {
            $RejectFile=$request->RejectFile;
        }

        $RejectProject= new  RejectProject();
            $RejectProject->Pro_Fid    =$request->Pro_Fid;   ;
            $RejectProject->Stat_Fid   =4  ;
            $RejectProject->Remarks    =$request->Remarks    ;
            $RejectProject->Date_Reject=$request->Date_Reject;
            $RejectProject->reject_status=1;
            $RejectProject->Reject_File=$RejectFile;
            $RejectProject->Report_File=$RejectReportFile;
        $RejectProject->Request_File=$RequestFile;

            $RejectProject->save();

            $rejisterporject =RegisterProcurement::find($request->Pro_Fid);
            $rejisterporject->reject_id=1;
            $rejisterporject->save();


        $Report = EvaluationReport::find($request->id);

        $Report->Save_Date = $request->Date_Reject;
        $Report->Pro_Fid = $request->Pro_Fid;
        $Report->Stat_Fid = $request->Stat_Fid;
        $Report->Report_File = $RejectReportFile;
        $Report->Accept_File = $AcceptFile;
        $Report->Request_File = $RequestFile;
        $Report->is_reject = 0;
        $Report->Remarks = $request->Remarks;
        $Report->Add_id = Auth::user()->id;
        $Report->save();


        return redirect()->action('RejectProjectController@List')->with('msg','معلومات شما تغیر شد');

        }












}









}
