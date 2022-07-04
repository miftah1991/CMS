<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Founder;
use App\ProcurementType;
use App\Province;
use App\District;
use App\RegisterProcurement;
use App\Process;
use App\CompleteProject;

class RegisterController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }


    public  function  index()
    {

$Founder=Founder::all();

$ProcurementType=ProcurementType::all();
$District=District::all();
$Province=Province::all();
        $count=RegisterProcurement::count();

     return view('Register_Project.welcome',compact('Founder','ProcurementType','District','Province','count'));

    }


    public  function  store(Request $request)
    {




       $this->validate($request,[
            'Project_Name'=>'required',
            'Rupee_Amount'=>'required|numeric',
            'Pro_Type_Fid'=>'required',
            'Fou_Fid'=>'required',
            'Dis_Fid'=>'required',
            'Order_Date'=>'required',
            'Order_Number'=>'required',
            'Location'=>'required',
            'Project_Member'=>'required',
            'Member_Phone'=>'required',
            'Member_Email'=>'required',

          'Requst_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
          'Plan_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,doc,docx,xlsx,xls',
          'Basic_File'=>'mimes:jpeg,jpg,png,gif,doc,pdf,doc,docx,xlsx,xls',
          'Attribute_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
          'Fund_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',


        ],
            ['Project_Name.required'=>'لطفا اسم پروژه داخل کنید',
                'Rupee_Amount.required'=>'لطفا قیمت تخمینی داخل کنید',
                'Rupee_Amount.numeric'=>'لطفا قیمت نمبر داخل کنید',
                'Pro_Type_Fid.required'=>'لطفا نوع پروژه داخل کنید',
                'Fou_Fid.required'=>'لطفا نوع تمویل کننده انتخاب کنید',
                'Dis_Fid.required'=>'لطفا ولسوالی انتخاب کنید',
                'Order_Date.required'=>'لطفا حکم تاریخ داخل کنید',
                'Order_Number.required'=>'لطفا حکم شماره داخل کنید',
                'Location.required'=>'لطفا معوقعیت داخل کنید',
                'Project_Member.required'=>'لطفا مسول پروژه داخل کنید',
                'Member_Phone.required'=>'لطفا شماره تماس داخل کنید',
                'Member_Email.required'=>'لطفا ایمل ادرس داخل کنید'


            ]);

        if($request->hasFile('Requst_File')){

            $Requst_File=$request->file('Requst_File');

            $Requst_Image = $Requst_File->getClientOriginalName();
            $Extension = $Requst_File->getClientOriginalExtension();

            $RequstFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Requst_File->storeAs('public/files', $RequstFile);

        }
        else
        {
            $RequstFile='';
        }
        if($request->hasFile('Basic_File')){

            $Basic_File=$request->file('Basic_File');

            $Basic = $Basic_File->getClientOriginalName();
            $Extension = $Basic_File->getClientOriginalExtension();

            $BasicFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
            $Basic_File->storeAs('public/files', $BasicFile);

        }
        else
        {

            $BasicFile='';
        }

        if($request->hasFile('Attribute_File')){

            $Attribute_File=$request->file('Attribute_File');

            $Attribute = $Attribute_File->getClientOriginalName();
            $Extension = $Attribute_File->getClientOriginalExtension();

            $AttributeFile =  $Attribute.date('mdYHis') . uniqid().'.'.$Extension;
            $Attribute_File->storeAs('public/files', $AttributeFile);

        }
        else
        {
            $AttributeFile='';

        }
        if($request->hasFile('Plan_File')){

            $Plan_File=$request->file('Plan_File');

            $Plan = $Plan_File->getClientOriginalName();
            $Extension = $Plan_File->getClientOriginalExtension();

            $PlanFile =  $Plan.date('mdYHis') . uniqid().'.'.$Extension;
            $Plan_File->storeAs('public/files', $PlanFile);

        } else
        {
            $PlanFile='';
        }
        if($request->hasFile('Fund_File')){

            $Fund_File=$request->file('Fund_File');

            $Fund = $Fund_File->getClientOriginalName();
            $Extension = $Fund_File->getClientOriginalExtension();

            $FundFile =  $Fund.date('mdYHis') . uniqid().'.'.$Extension;
            $Fund_File->storeAs('public/files', $FundFile);

        }
        else
        {
            $FundFile='';
        }


    $RegiserProcuremnt= new RegisterProcurement();

        $RegiserProcuremnt->Pro_Code  =$request->Project_Code  ;
$RegiserProcuremnt->Project_Name  =$request->Project_Name  ;
$RegiserProcuremnt->Pro_Type_Fid       =$request->Pro_Type_Fid       ;
$RegiserProcuremnt->Fou_Fid       =$request->Fou_Fid       ;
$RegiserProcuremnt->Dis_Fid       =$request->Dis_Fid       ;
$RegiserProcuremnt->Rupee_Amount  =$request->Rupee_Amount  ;
$RegiserProcuremnt->Accepts_Fund  =$request->Accepts_Fund  ;
$RegiserProcuremnt->Order_Date    =$request->Order_Date    ;
$RegiserProcuremnt->Order_Number  =$request->Order_Number  ;
$RegiserProcuremnt->Location      =$request->Location      ;
$RegiserProcuremnt->Project_Member=$request->Project_Member;
$RegiserProcuremnt->Member_Phone  =$request->Member_Phone  ;
$RegiserProcuremnt->Member_Email  =$request->Member_Email  ;
        $RegiserProcuremnt->rupee  =$request->rupee  ;
        $RegiserProcuremnt->reject_id  =0 ;
        $RegiserProcuremnt->is_complete  =0 ;

$RegiserProcuremnt->Requst_File   =$RequstFile;
$RegiserProcuremnt->Plan_File     =$PlanFile     ;
$RegiserProcuremnt->Basic_File    =$BasicFile    ;
$RegiserProcuremnt->Attribute_File=$AttributeFile;
$RegiserProcuremnt->Fund_File     =$FundFile     ;
$RegiserProcuremnt->status        =$request->status     ;
$RegiserProcuremnt->remarks       =$request->remarks   ;

        $RegiserProcuremnt->save();
        if($RegiserProcuremnt->save())
        {
            $id=$RegiserProcuremnt->id;
            $process= new Process();
            $process->tblnanme="register";
            $process->Pro_Fid=$id;
            $process->Name="حالت پلانی";
            $process->save();
        }

        return redirect()->action('RegisterController@Register_Project_List')->with('msg','معلومات شما ثپت شد');



    }





    public  function  Register_Project_List()
    {

        $data=RegisterProcurement::find(1);


        $data=RegisterProcurement::orderBy('id','desc')->get();


        return view('Register_Project.Register_Project_List',compact('data'));

    }



    public  function  View_Register_Project($id)
    {




        $data=RegisterProcurement::find($id);




        return view('Register_Project.view',compact('data'));


    }

    public  function  Print_Register_Project($id)
    {


        $count=RegisterProcurement::count();

        $data=RegisterProcurement::find($id);




        return view('Register_Project.print',compact('data','count'));


    }






    public  function  Edit($id)

    {
        $edata=RegisterProcurement::find($id);






            $Province=Province::all();
            $Founder=Founder::all();

            $ProcurementType=ProcurementType::all();
            $District=District::where('province_id',$edata->district->province_id)->get();

            return view('Register_Project.Edit',compact('edata','District','Province','ProcurementType','Founder'));

        }



    public  function  update(Request $request)
    {

        $this->validate($request,[
            'Project_Name'=>'required',
            'Rupee_Amount'=>'required|numeric',
            'Pro_Type_Fid'=>'required',
            'Fou_Fid'=>'required',
            'Dis_Fid'=>'required',
            'Order_Date'=>'required',
            'Order_Number'=>'required',
            'Location'=>'required',
            'Project_Member'=>'required',
            'Member_Phone'=>'required',
            'Member_Email'=>'required',
         'Requst_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
          'Plan_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,doc,docx,xlsx,xls',
          'Basic_File'=>'mimes:jpeg,jpg,png,gif,doc,pdf,doc,docx,xlsx,xls',
          'Attribute_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls',
          'Fund_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc,docx,xlsx,xls'


        ],
            ['Project_Name.required'=>'لطفا اسم پروژه داخل کو',
                'Rupee_Amount.required'=>'لطفا قیمت تخمینی داخل کو',
                'Rupee_Amount.numeric'=>'لطفا قیمت نمبر داخل کو',
                'Pro_Type_Fid.required'=>'لطفا نوع پروژه داخل کو',
                'Fou_Fid.required'=>'لطفا نوع تمویل کننده انتخاب کو',
                'Dis_Fid.required'=>'لطفا ولسوالی انتخاب کو',
                'Order_Date.required'=>'لطفا حکم تاریخ داخل کو',
                'Order_Number.required'=>'لطفا حکم شماره داخل کو',
                'Location.required'=>'لطفا معوقعیت داخل کو',
                'Project_Member.required'=>'لطفا مسول پروژه داخل کو',
                'Member_Phone.required'=>'لطفا شماره تماس داخل کو',
                'Member_Email.required'=>'لطفا ایمل ادرس داخل کو',
        'Requst_File.mimes'=>'لطفا بشنهاد منظوری اصلی فارمت داخل کنید',
                'Plan_File.mimes'=>'لطفا پلاان تدارکاتی اصلی فارمت داخل کنید',
                'Basic_File.mimes'=>'لطفا فورم معلوماتی اصلی فارمت داخل کنید',
                'Attribute_File.mimes'=>'لطفا مشخصات  اصلی فارمت داخل کنید',
                'Fund_File.mimes'=>'لطفا منظوری بودیجه اصلی فارمت داخل کنید'
            ]);

        if($request->hasFile('Requst_File')){

            $Requst_File=$request->file('Requst_File');

            $Requst_Image = $Requst_File->getClientOriginalName();
            $Extension = $Requst_File->getClientOriginalExtension();

            $RequstFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Requst_File->storeAs('public/files', $RequstFile);

        }
        else
        {
            $RequstFile=$request->RequstFile;
        }
        if($request->hasFile('Basic_File')){

            $Basic_File=$request->file('Basic_File');

            $Basic = $Basic_File->getClientOriginalName();
            $Extension = $Basic_File->getClientOriginalExtension();

            $BasicFile =  $Basic.date('mdYHis') . uniqid().'.'.$Extension;
            $Basic_File->storeAs('public/files', $BasicFile);

        }
        else
        {
            $BasicFile=$request->BasicFile;
        }

        if($request->hasFile('Attribute_File')){

            $Attribute_File=$request->file('Attribute_File');

            $Attribute = $Attribute_File->getClientOriginalName();
            $Extension = $Attribute_File->getClientOriginalExtension();

            $AttributeFile =  $Attribute.date('mdYHis') . uniqid().'.'.$Extension;
            $Attribute_File->storeAs('public/files', $AttributeFile);

        }
        else
        {
            $AttributeFile=$request->AttributeFile;
        }
        if($request->hasFile('Plan_File')){

            $Plan_File=$request->file('Plan_File');

            $Plan = $Plan_File->getClientOriginalName();
            $Extension = $Plan_File->getClientOriginalExtension();

            $PlanFile =  $Plan.date('mdYHis') . uniqid().'.'.$Extension;
            $Plan_File->storeAs('public/files', $PlanFile);

        }
        else
        {
            $PlanFile=$request->PlanFile;
        }
        if($request->hasFile('Fund_File')){

            $Fund_File=$request->file('Fund_File');

            $Fund = $Fund_File->getClientOriginalName();
            $Extension = $Fund_File->getClientOriginalExtension();

            $FundFile =  $Fund.date('mdYHis') . uniqid().'.'.$Extension;
            $Fund_File->storeAs('public/files', $FundFile);

        }
        else
        {
            $FundFile=$request->FundFile;
        }


        $RegiserProcuremnt=RegisterProcurement::findorFail($request->id);

    $RegiserProcuremnt->Pro_Code  =$request->Project_Code  ;
        $RegiserProcuremnt->Project_Name  =$request->Project_Name  ;
        $RegiserProcuremnt->Pro_Type_Fid       =$request->Pro_Type_Fid       ;
        $RegiserProcuremnt->Fou_Fid       =$request->Fou_Fid       ;
        $RegiserProcuremnt->Dis_Fid       =$request->Dis_Fid       ;
        $RegiserProcuremnt->Rupee_Amount  =$request->Rupee_Amount  ;
        $RegiserProcuremnt->Accepts_Fund  =$request->Accepts_Fund  ;
        $RegiserProcuremnt->Order_Date    =$request->Order_Date    ;
        $RegiserProcuremnt->Order_Number  =$request->Order_Number  ;
        $RegiserProcuremnt->Location      =$request->Location      ;
        $RegiserProcuremnt->Project_Member=$request->Project_Member;
        $RegiserProcuremnt->Member_Phone  =$request->Member_Phone  ;
        $RegiserProcuremnt->Member_Email  =$request->Member_Email  ;
        $RegiserProcuremnt->rupee  =$request->rupee  ;
        $RegiserProcuremnt->reject_id  =0 ;
        $RegiserProcuremnt->is_complete  =0 ;
        $RegiserProcuremnt->Requst_File   =$RequstFile;
        $RegiserProcuremnt->Plan_File     =$PlanFile     ;
        $RegiserProcuremnt->Basic_File    =$BasicFile    ;
        $RegiserProcuremnt->Attribute_File=$AttributeFile;
        $RegiserProcuremnt->Fund_File     =$FundFile     ;
        $RegiserProcuremnt->status        =$request->status     ;
        $RegiserProcuremnt->remarks       =$request->remarks   ;

        $RegiserProcuremnt->save();

        return redirect()->action('RegisterController@Register_Project_List')->with('msg','معلومات شما تغیر شد');
    }

}
