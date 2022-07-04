<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisterProcurement;
use App\Statustype;
use App\RejectProject;

class RejectProjectController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }

   public  function  index($id)
   {

       $data=RegisterProcurement::find($id);

       $statustype=Statustype::all();

       return view('Reject_Project.index',compact('data','statustype'));

   }


   public  function  View($id)
   {
      $data=RejectProject::where('id',$id)->first();


      return view('Reject_Project.view',compact('data'));

   }








   public  function  store(Request $request)
   {

       if($request->hasFile('Reject_File')){

           $Reject_File=$request->file('Reject_File');

           $Requst_Image = $Reject_File->getClientOriginalName();
           $Extension = $Reject_File->getClientOriginalExtension();

           $RejectFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
           $Reject_File->storeAs('public/Reject', $RejectFile);

       }
       else
       {
           $RejectFile='';
       }




           if($request->hasFile('Report_File')){

               $Report_File=$request->file('Report_File');

               $Requst_Image = $Report_File->getClientOriginalName();
               $Extension = $Report_File->getClientOriginalExtension();

               $ReportFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
               $Report_File->storeAs('public/Reject', $ReportFile);

           }
           else
           {
               $ReportFile='';
           }









       $RegisterProcurement=RegisterProcurement::find($request->id);
       $RegisterProcurement->reject_id=1;
       $RegisterProcurement->save();
       if($RegisterProcurement->save())
       {
           $RejectProject= new RejectProject();
           $RejectProject->Pro_Fid    =$request->id    ;
           $RejectProject->Stat_Fid   =$request->Stat_Fid   ;
           $RejectProject->Remarks    =$request->Remarks    ;
           $RejectProject->Date_Reject=$request->Date_Reject;
           $RejectProject->reject_status=1;
           $RejectProject->Reject_File=$RejectFile;
           $RejectProject->Report_File=$ReportFile;

           $RejectProject->save();
       }

return redirect()->action('RejectProjectController@List')->with('msg','معلومات شما ثپت شد');


   }


   public function  List()
   {
       $data=RejectProject::orderBy('id','desc')->get();

       return view('Reject_Project.List',compact('data'));
   }


   public function  Edit($id)
   {
       $statustype=Statustype::all();
       $data=RejectProject::find($id);

       return view('Reject_Project.Edit',compact('data','statustype'));

   }

   public function  Update(Request $request)
   {

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

       if($request->hasFile('Report_File')){

           $Report_File=$request->file('Report_File');

           $Requst_Image = $Report_File->getClientOriginalName();
           $Extension = $Report_File->getClientOriginalExtension();

           $ReportFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
           $Report_File->storeAs('public/Reject', $ReportFile);

       }
       else
       {
           $ReportFile=$request->ReportFile;
       }



       $RegisterProcurement=RegisterProcurement::find($request->Pro_Fid);
       $RegisterProcurement->reject_id=$request->Status;
       $RegisterProcurement->save();
       if($RegisterProcurement->save())
       {
           $RejectProject=RejectProject::find($request->id);

           $RejectProject->Pro_Fid=$request->Pro_Fid;
           $RejectProject->Stat_Fid=$request->Stat_Fid   ;
           $RejectProject->Remarks=$request->Remarks;
           $RejectProject->reject_status=$request->Status;
           $RejectProject->Date_Reject=$request->Date_Reject;
           $RejectProject->Reject_File=$RejectFile;
           $RejectProject->Report_File=$ReportFile;
           $RejectProject->save();
       }

       return redirect()->action('RejectProjectController@List')->with('msg','معلومات شما تغیر شد');

   }

}
