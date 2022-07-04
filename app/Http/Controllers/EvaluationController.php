<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyContact;
use App\RegisterProcurement;
use App\Evaluation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\AounceProjectMemberList;
use App\Process;
use App\CompleteProject;


class EvaluationController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }
   public  function   index()

   {



       $register_project=DB::table('registerprocurement')->join('offercompany','offercompany.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')
           ->where('registerprocurement.is_complete',0)
           ->where('registerprocurement.reject_id',0)->get();
       return view('Evaluation_Project.Add_Evaluation_Project',compact('register_project'));
   }


   public  function  store(Request $request)
   {


       $this->validate($request,[
           'Pro_Fid'=>'required',
           'Start_Date'=>'required',
           'End_Date'=>'required',
           'Request_File'=>'mimes:jpeg,jpg,png,gif,pdf',
           'Esitlam_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc',
           'Extend_File'=>'mimes:jpeg,jpg,png,gif,doc,pdf',




       ],
           ['Pro_Fid.required'=>'لطفا اسم پروژه داخل کنید',
               'Start_Date.required'=>'لطفا تاریخ اغاز داخل کنید',

               'End_Date.required'=>'لطفا تاریخ ختم داخل کنید'




           ]);







       if($request->hasFile('Request_File')){

           $Request_File=$request->file('Request_File');

           $Requst_Image = $Request_File->getClientOriginalName();
           $Extension = $Request_File->getClientOriginalExtension();

           $RequestFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
           $Request_File->storeAs('public/Eval_Files', $RequestFile);

       }
       else
       {
           $RequestFile='';
       }
       if($request->hasFile('Estilam_File')){

           $Estilam_File=$request->file('Estilam_File');

           $Basic = $Estilam_File->getClientOriginalName();
           $Extension = $Estilam_File->getClientOriginalExtension();

           $EstilamFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
           $Estilam_File->storeAs('public/Eval_Files', $EstilamFile);

       }

       else
       {
           $EstilamFile='';
       }
       if($request->hasFile('Extend_File')){

           $Extend_File=$request->file('Extend_File');

           $Attribute = $Extend_File->getClientOriginalName();
           $Extension = $Extend_File->getClientOriginalExtension();

           $ExtendFile =  $Attribute.date('mdYHis') . uniqid().'.'.$Extension;
           $Extend_File->storeAs('public/Eval_Files', $ExtendFile);

       }
       else
       {
           $ExtendFile='';
       }


       $Evaluation=new Evaluation();
       $Evaluation->Start_Date   =$request->Start_Date   ;
       $Evaluation-> End_Date    =$request-> End_Date    ;
       $Evaluation->Time    =$request->Time    ;
       $Evaluation->Eval_Place    =$request->Eval_Place    ;


       $Evaluation->eval_email=0;
         $Evaluation->eval_ten=0;
         $Evaluation->eval_15=0;
         $Evaluation->eval_20=0;
         $Evaluation->eval_30=0;


       $Evaluation-> Pro_Fid     =$request-> Pro_Fid     ;
       $Evaluation-> Add_id      =Auth::user()->id ;
       $Evaluation-> Request_File=$RequestFile;
       $Evaluation-> Extend_File =$ExtendFile ;
       $Evaluation-> Estilam_File=$EstilamFile;
       $Evaluation->remark=$request->remark;
       $Evaluation->save();
       if($Evaluation->save()) {

           $process= new Process();
           $process->Pro_Fid=$request->Pro_Fid;
           $process->tblnanme="eval";
           $process->Name="حالت ارزیابی هیت";
           $process->save();
           $rows = $request->rows;
           if(isset($rows))
           {
           foreach ($rows as $row) {
               $List = new AounceProjectMemberList();


               $List->Emp_Code = $row['EmpCode'];
               $List->Phone = $row['Mobile'];
               $List->Emp_Name = $row['Name'];
               $List->Email = $row['Email'];
               $List->Send_Type = 2;
               $List->Eval_Fid =$Evaluation->id;
               $List->save();


           }
           }

           return redirect()->action('EvaluationController@List')->with('msg','معلومات شما ثپت شد');
       }







   }




   public  function  Update(Request $request)
   {


       $this->validate($request,[
           'Pro_Fid'=>'required',
           'Start_Date'=>'required',
           'End_Date'=>'required',

           'Request_File'=>'mimes:jpeg,jpg,png,gif,pdf',
           'Esitlam_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc',
           'Extend_File'=>'mimes:jpeg,jpg,png,gif,doc,pdf',




       ],
           ['Pro_Fid.required'=>'لطفا اسم پروژه داخل کنید',
               'Start_Date.required'=>'لطفا تاریخ اغاز داخل کنید',

               'End_Date.required'=>'لطفا تاریخ ختم داخل کنید'




           ]);







       if($request->hasFile('Request_File')){

           $Request_File=$request->file('Request_File');

           $Requst_Image = $Request_File->getClientOriginalName();
           $Extension = $Request_File->getClientOriginalExtension();

           $RequestFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
           $Request_File->storeAs('public/Eval_Files', $RequestFile);

       }
       else
       {
           $RequestFile=$request->RequestFile;
       }
       if($request->hasFile('Estilam_File')){

           $Estilam_File=$request->file('Estilam_File');

           $Basic = $Estilam_File->getClientOriginalName();
           $Extension = $Estilam_File->getClientOriginalExtension();

           $EstilamFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
           $Estilam_File->storeAs('public/Eval_Files', $EstilamFile);

       }
else
{
    $EstilamFile=$request->EstilamFile;
}
       if($request->hasFile('Extend_File')){

           $Extend_File=$request->file('Extend_File');

           $Attribute = $Extend_File->getClientOriginalName();
           $Extension = $Extend_File->getClientOriginalExtension();

           $ExtendFile =  $Attribute.date('mdYHis') . uniqid().'.'.$Extension;
           $Extend_File->storeAs('public/Eval_Files', $ExtendFile);

       }
       else
       {
           $ExtendFile=$request->ExtendFile;
       }



       $Evaluation=Evaluation::find($request->id);
       $Evaluation->Start_Date   =$request->Start_Date   ;
       $Evaluation-> End_Date    =$request-> End_Date    ;
       $Evaluation->Time    =$request->Time    ;
       $Evaluation->Eval_Place    =$request->Eval_Place    ;
       $Evaluation-> Pro_Fid     =$request-> Pro_Fid     ;
       $Evaluation-> Add_id      =Auth::user()->id ;
       $Evaluation-> Request_File=$RequestFile;
       $Evaluation-> Extend_File =$ExtendFile ;
       $Evaluation-> Estilam_File=$EstilamFile;
       $Evaluation->remark=$request->remark;
       $Evaluation->save();
       if($Evaluation->save()) {
           $rows = $request->rows;
           if(isset($rows))
           {


           foreach ($rows as $row) {
               $List = new AounceProjectMemberList();


               $List->Emp_Code = $row['EmpCode'];
               $List->Phone = $row['Mobile'];
               $List->Emp_Name = $row['Name'];
               $List->Email = $row['Email'];
               $List->Send_Type = 2;
               $List->Eval_Fid =$Evaluation->id;
               $List->save();


           }

           }
           return redirect()->action('EvaluationController@List')->with('msg','معلومات شما تغیر شد');
       }






   }



   public function List()
   {

$data=Evaluation::orderBy('id','desc')->get();


       return view('Evaluation_Project.List',compact('data'));

   }
   public  function Edit($id)
   {
       $data=Evaluation::find($id);



           $register_project=DB::table('registerprocurement')->join('offercompany','offercompany.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')
               ->where('registerprocurement.id',$data->Pro_Fid)
               ->get();

           $Team_Contact_List=AounceProjectMemberList::where('Eval_Fid',$data->id)->get();
           return view('Evaluation_Project.Edit',compact('data','register_project','Team_Contact_List'));




   }


   public  function  View($id)
   {
      $data= Evaluation::find($id);
       $Team_Contact_List=AounceProjectMemberList::where('Eval_Fid',$data->id)->get();
       return view('Evaluation_Project.view',compact('data','Team_Contact_List'));
   }
    public  function  print($id)
    {
        $data= Evaluation::find($id);
        $Team_Contact_List=AounceProjectMemberList::where('Eval_Fid',$data->id)->get();
        return view('Evaluation_Project.print',compact('data','Team_Contact_List'));
    }
}
