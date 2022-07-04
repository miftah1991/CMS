<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisterProcurement;
use App\AnouceProject;
use App\AounceProjectMemberList;
use App\CompleteProject;
use Illuminate\Support\Facades\DB;
use App\Process;
use jDateTime;
class AnounceController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public  function  Register_Anouce_project()
    {

        $register_project=RegisterProcurement::orderBy('id','desc')->where('reject_id',0)->where('is_complete',0)->get();




        return  view('Anounce_Project.Add_Anounce_Project',compact('register_project'));

    }
    public  function GetEmpMember(Request $request)
    {



        $content = file_get_contents("http://10.10.150.28/PublicAPIs/GetDataForHakim?EmpCode=".$request->data);
        $result  = json_decode($content);
        return response()->json($result);
     //   return $content;
    }


    public  function  store(Request $request)
    {





        $this->validate($request,[

            'Aoun_Date'=>'required',
            'Offer_Date'=>'required',
            'Accept_Date'=>'required',
            'Met_Date'=>'required',
            'Pro_Fid'=>'required',

            'List_File'=>'required',
            'Accept_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
            'Menot_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
            'Anouce_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
            'Extend_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
            'Request_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
              'Met_offer_File'=>'mimes:jpeg,jpg,png,gif,pdf,,doc,docx,xlsx,xls',
            'List_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',


        ],
            ['Pro_Code.required'=>'لطفا کود پروژه داخل کو',

                'Aoun_Date.required'=>'لطفا تاریخ اعلان داخل کو',
                'Offer_Date.required'=>'لطفا تاریخ افرکشایی داخل کو',
                'Accept_Date.required'=>'لطفا تاریخ منظوری کو',
                'Met_Date.required'=>'لطفا تاریخ جلسه کو',
                'Pro_Fid.required'=>'لطفا نوع پروژه انتخاب کو'



            ]);

        if($request->hasFile('Accept_File')){

            $Accept_File=$request->file('Accept_File');

            $Requst_Image = $Accept_File->getClientOriginalName();
            $Extension = $Accept_File->getClientOriginalExtension();

            $AcceptFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Accept_File->storeAs('public/files', $AcceptFile);

        }
        else
        {
            $AcceptFile='';
        }
        if($request->hasFile('Menot_File')){

            $Menot_File=$request->file('Menot_File');

            $Basic = $Menot_File->getClientOriginalName();
            $Extension = $Menot_File->getClientOriginalExtension();

            $MenotFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
            $Menot_File->storeAs('public/files', $MenotFile);

        }
else
{
    $MenotFile='';
}
        if($request->hasFile('Anouce_File')){

            $Anouce_File=$request->file('Anouce_File');

            $Attribute = $Anouce_File->getClientOriginalName();
            $Extension = $Anouce_File->getClientOriginalExtension();

            $AnouceFile =  $Attribute.date('mdYHis') . uniqid().'.'.$Extension;
            $Anouce_File->storeAs('public/files', $AnouceFile);

        }
        else
        {
            $AnouceFile='';
        }
        if($request->hasFile('Extend_File')){

            $Extend_File=$request->file('Extend_File');

            $Extend = $Extend_File->getClientOriginalName();
            $Extension = $Extend_File->getClientOriginalExtension();

            $ExtendFile =  $Extend.date('mdYHis') . uniqid().'.'.$Extension;
            $Extend_File->storeAs('public/files', $ExtendFile);

        }
        else
        {
            $ExtendFile='';
        }
        if($request->hasFile('Request_File')){

            $Request_File=$request->file('Request_File');

            $Fund = $Request_File->getClientOriginalName();
            $Extension = $Request_File->getClientOriginalExtension();

            $RequestFile =  $Fund.date('mdYHis') . uniqid().'.'.$Extension;
            $Request_File->storeAs('public/files', $RequestFile);

        }
        else
        {
            $RequestFile='';
        }
        if($request->hasFile('Met_offer_File')){

            $Met_offer_File=$request->file('Met_offer_File');

            $Met = $Met_offer_File->getClientOriginalName();
            $Extension = $Met_offer_File->getClientOriginalExtension();

            $MetofferFile =  $Met.date('mdYHis') . uniqid().'.'.$Extension;
            $Met_offer_File->storeAs('public/files', $MetofferFile);

        }
        else
        {
            $MetofferFile='';
        }
        if($request->hasFile('List_File')){

            $List_File=$request->file('List_File');

            $List = $List_File->getClientOriginalName();
            $Extension = $List_File->getClientOriginalExtension();

            $ListFile =  $List.date('mdYHis') . uniqid().'.'.$Extension;
            $List_File->storeAs('public/files', $ListFile);

        }

        else
        {
            $ListFile='';
        }

//        try {
//            DB::beginTransaction();
            $AounceProject = new AnouceProject();


            $AounceProject->Aoun_Date     =$request->Aoun_Date;
            $AounceProject->Offer_Date   =$request->Offer_Date;
            $AounceProject->Accept_Date   =$request->Accept_Date;
            $AounceProject->Met_Date      =$request->Met_Date;
        $AounceProject->Offer_Place      =$request->Offer_Place;
        $AounceProject->Offer_Time=$request->Offer_Time;



        $AounceProject->offer_email=0;
$AounceProject->met_email=0;


            $AounceProject->Accept_File   =$AcceptFile;
            $AounceProject->Menot_File    =$MenotFile;
            $AounceProject->Anouce_File   =$AnouceFile;
            $AounceProject->Extend_File   =$ExtendFile;
            $AounceProject->Request_File  =$RequestFile;
            $AounceProject->Met_offer_File=$MetofferFile;


            $AounceProject->List_File     =$ListFile;
            $AounceProject->remarks       =$request->remarks;
            $AounceProject->status        =0;
            $AounceProject->Pro_Fid       =$request->Pro_Fid;

            $AounceProject->save();
            if($AounceProject->save())
            {



                $process= new Process();
                $process->Pro_Fid=$request->Pro_Fid;
                $process->Name="حالت اعلان";
                $process->tblnanme="aounce";
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
                    $List->Send_Type =1;
                    $List->Ano_Fid = $AounceProject->id;
                    $List->save();
                }
                }
            }
        return redirect()->action('AnounceController@AounceProjectList')->with('msg','ریکارد شما ثبت شد');
     /*       DB::commit();
        } catch (\PDOException $e) {

            DB::rollBack();
            return redirect()->back();
        }*/







    }
    public function  AounceProjectList()
    {


        $data=AnouceProject::orderBy('id','desc')->get();


        return view('Anounce_Project.List',compact('data'));

    }


    public  function  Edit($id)
    {


        $edata=AnouceProject::findorFail($id);
        $complete_project=CompleteProject::where('Pro_Fid',$edata->id)->first();

        if($complete_project)
        {
            return redirect()->action('LoginController@logout')  ;
        }
        else
        {
            $Team_Contact_List=AounceProjectMemberList::where('Ano_Fid',$edata->id)->get();
            $register_project=RegisterProcurement::where('id',$edata->Pro_Fid)->get();
            return view('Anounce_Project.Edit',compact('edata','register_project','Team_Contact_List'));

        }




    }


    public  function update(Request $request)
    {


        $AounceProject=AnouceProject::findorFail($request->id);



        $this->validate($request,[

            'Aoun_Date'=>'required',
            'Offer_Date'=>'required',
            'Accept_Date'=>'required',
            'Met_Date'=>'required',
            'Pro_Fid'=>'required',


              'Accept_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
            'Menot_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
            'Anouce_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
            'Extend_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
            'Request_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
              'Met_offer_File'=>'mimes:jpeg,jpg,png,gif,pdf,,doc,docx,xlsx,xls',
            'List_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',


        ],
            [

                'Aoun_Date.required'=>'لطفا تاریخ اعلان داخل کو',
                'Offer_Date.required'=>'لطفا تاریخ افرکشایی داخل کو',
                'Accept_Date.required'=>'لطفا تاریخ منظوری کو',
                'Met_Date.required'=>'لطفا تاریخ جلسه کو',
                'Pro_Fid.required'=>'لطفا نوع پروژه انتخاب کو',



            ]);

        if($request->hasFile('Accept_File')){

            $Accept_File=$request->file('Accept_File');

            $Requst_Image = $Accept_File->getClientOriginalName();
            $Extension = $Accept_File->getClientOriginalExtension();

            $AcceptFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Accept_File->storeAs('public/files', $AcceptFile);

        }
        else
        {
            $AcceptFile=$request->AcceptFile;

        }
        if($request->hasFile('Menot_File')){

            $Menot_File=$request->file('Menot_File');

            $Basic = $Menot_File->getClientOriginalName();
            $Extension = $Menot_File->getClientOriginalExtension();

            $MenotFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
            $Menot_File->storeAs('public/files', $MenotFile);

        }
        else
        {
            $MenotFile=$request->MenotFile;
        }

        if($request->hasFile('Anouce_File')){

            $Anouce_File=$request->file('Anouce_File');

            $Attribute = $Anouce_File->getClientOriginalName();
            $Extension = $Anouce_File->getClientOriginalExtension();

            $AnouceFile =  $Attribute.date('mdYHis') . uniqid().'.'.$Extension;
            $Anouce_File->storeAs('public/files', $AnouceFile);

        }
        else
        {
            $AnouceFile=$request->AnouceFile;
        }
        if($request->hasFile('Extend_File')){

            $Extend_File=$request->file('Extend_File');

            $Extend = $Extend_File->getClientOriginalName();
            $Extension = $Extend_File->getClientOriginalExtension();

            $ExtendFile =  $Extend.date('mdYHis') . uniqid().'.'.$Extension;
            $Extend_File->storeAs('public/files', $ExtendFile);

        }
        else
        {
            $ExtendFile=$request->ExtendFile;

        }
        if($request->hasFile('Request_File')){

            $Request_File=$request->file('Request_File');

            $Fund = $Request_File->getClientOriginalName();
            $Extension = $Request_File->getClientOriginalExtension();

            $RequestFile =  $Fund.date('mdYHis') . uniqid().'.'.$Extension;
            $Request_File->storeAs('public/files', $RequestFile);

        }
        else
        {
            $RequestFile=$request->RequestFile;
        }
        if($request->hasFile('Met_offer_File')){

            $Met_offer_File=$request->file('Met_offer_File');

            $Met = $Met_offer_File->getClientOriginalName();
            $Extension = $Met_offer_File->getClientOriginalExtension();

            $MetofferFile =  $Met.date('mdYHis') . uniqid().'.'.$Extension;
            $Met_offer_File->storeAs('public/files', $MetofferFile);

        }
        else
        {
            $MetofferFile=$request->MetofferFile;
        }
        if($request->hasFile('List_File')){

            $List_File=$request->file('List_File');

            $List = $List_File->getClientOriginalName();
            $Extension = $List_File->getClientOriginalExtension();

            $ListFile =  $List.date('mdYHis') . uniqid().'.'.$Extension;
            $List_File->storeAs('public/files', $ListFile);

        }
        else
        {
            $ListFile=$request->ListFile ;
        }





        $AounceProject->Aoun_Date     =$request->Aoun_Date;
        $AounceProject->Offer_Date   =$request->Offer_Date;
        $AounceProject->Accept_Date   =$request->Accept_Date;
        $AounceProject->Met_Date      =$request->Met_Date;
        $AounceProject->Offer_Place      =$request->Offer_Place;
        $AounceProject->Offer_Time=$request->Offer_Time;
        $AounceProject->Accept_File   =$AcceptFile;
        $AounceProject->Menot_File    =$MenotFile;
        $AounceProject->Anouce_File   =$AnouceFile;
        $AounceProject->Extend_File   =$ExtendFile;
        $AounceProject->Request_File  =$RequestFile;
        $AounceProject->Met_offer_File=$MetofferFile;

        $AounceProject->List_File     =$ListFile;
        $AounceProject->remarks       =$request->remarks;
        $AounceProject->status        =0;
        $AounceProject->Pro_Fid       =$request->Pro_Fid;

        $AounceProject->save();
       if($AounceProject->save()) {
           $rows = $request->rows;
           if (isset($rows)) {
               $rows = $request->rows;
               foreach ($rows as $row) {
                   $List = new AounceProjectMemberList();


                   $List->Emp_Code = $row['EmpCode'];
                   $List->Phone = $row['Mobile'];
                   $List->Emp_Name = $row['Name'];
                   $List->Email = $row['Email'];
                   $List->Send_Type =1;
                   $List->Ano_Fid = $AounceProject->id;
                   $List->save();
               }
           }
       }
        return redirect()->action('AnounceController@AounceProjectList')->with('msg','ریکارد شما تغیر شد');








    }



    public  function  view($id)
    {

        $data=AnouceProject::findorFail($id);

        $Member_List=AounceProjectMemberList::where('Ano_Fid',$data->id)->get();


        return view('Anounce_Project.view',compact('data','Member_List'));

    }
    public  function  print($id)
    {

        $data=AnouceProject::findorFail($id);

        $Member_List=AounceProjectMemberList::where('Ano_Fid',$data->id)->get();


        return view('Anounce_Project.print',compact('data','Member_List'));

    }

}
