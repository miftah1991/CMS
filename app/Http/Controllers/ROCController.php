<?php

namespace App\Http\Controllers;

use App\Evaluation;
use Illuminate\Http\Request;
use App\RegisterProcurement;
use App\OfferCompany;
use App\CompanyContact;
use Illuminate\Support\Facades\DB;
use App\CompleteProject;
use  App\Process;
class ROCController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }
    public  function  index()
    {

        $register_project=DB::table('registerprocurement')->join('anouce_project','anouce_project.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')->
        where('registerprocurement.reject_id',0)
            ->where('registerprocurement.is_complete',0)->get();

        return  view('Register_Offer_Company.index',compact('register_project'));
    }



    public  function  store(Request $request)
    {

        $this->validate($request,[
            'Date'=>'required',
            'Pro_Fid'=>'required',
            'Ano_Fid'=>'required'



        ],
            ['Date.required'=>'لطفا تاریخ شرکت اف ثپت کنید',

                'Pro_Fid.required'=>'لطفا پروژه انتخاب کنید',

                'Ano_Fid.required'=>'لطفا پروژه اعلان انتخاب کنید'




            ]);


        $offer_Company=new OfferCompany();


$offer_Company->Offer_Date=$request->Date;
$offer_Company->Pro_Fid   =$request->Pro_Fid   ;
$offer_Company->Ano_Fid   =$request->Ano_Fid   ;
$offer_Company->remark    =$request->remark    ;

$offer_Company->save();
if($offer_Company->save())
{
    $process= new Process();
    $process->Pro_Fid=$request->Pro_Fid;
    $process->tblnanme="offercompany";
    $process->Name="حالت افر شرکت ها";
    $process->save();
        $rows = $request->rows;
        if (isset($rows)) {
            $rows = $request->rows;
            foreach ($rows as $row) {
                $OfferCompnayContact= new  CompanyContact();
                $OfferCompnayContact->Name=$row['Name'];
                $OfferCompnayContact->jawaz=$row['Jawaz'];
                $OfferCompnayContact->MemberName=$row['MemberName'];
                $OfferCompnayContact->position=$row['position'];
                $OfferCompnayContact->Phone=$row['Phone'];
                $OfferCompnayContact->Email= $row['Email'];
                $OfferCompnayContact->Off_Fid = $offer_Company->id;
                $OfferCompnayContact->save();

        }
    }
    return redirect()->action('ROCController@List')->with('msg','معلومات شما ثپت شدی');


}


    }


    public  function  List()
    {
     $data=OfferCompany::orderBy('id','desc')->get();

return view('Register_Offer_Company.List',compact('data'));
    }



    public  function  Update(Request $request)
    {

        $this->validate($request,[
            'Date'=>'required',
            'Pro_Fid'=>'required',
            'Ano_Fid'=>'required'



        ],
            ['Date.required'=>'لطفا تاریخ شرکت اف ثپت کنید',

                'Pro_Fid.required'=>'لطفا پروژه انتخاب کنید',

                'Ano_Fid.required'=>'لطفا پروژه اعلان انتخاب کنید'




            ]);


        $offer_Company=OfferCompany::find($request->id);



        $offer_Company->Offer_Date=$request->Date;
        $offer_Company->Pro_Fid   =$request->Pro_Fid   ;
        $offer_Company->Ano_Fid   =$request->Ano_Fid   ;
        $offer_Company->remark    =$request->remark    ;

        $offer_Company->save();
        if($offer_Company->save())
        {





            $rows = $request->rows;
            if (isset($rows)) {
                $rows = $request->rows;
                foreach ($rows as $row) {
                    $OfferCompnayContact= new  CompanyContact();
                    $OfferCompnayContact->Name=$row['Name'];
                    $OfferCompnayContact->jawaz=$row['Jawaz'];
                    $OfferCompnayContact->MemberName=$row['MemberName'];
                    $OfferCompnayContact->position=$row['position'];
                    $OfferCompnayContact->Phone=$row['Phone'];
                    $OfferCompnayContact->Email= $row['Email'];
                    $OfferCompnayContact->Off_Fid = $offer_Company->id;
                    $OfferCompnayContact->save();

                }
            }
            return redirect()->action('ROCController@List')->with('msg','معلومات شما تغیر شدی');



        }
    }


    public  function  Edit($id)
    {
      $data=OfferCompany::find($id);

        $complete_project=CompleteProject::where('Pro_Fid',$data->id)->first();

        if($complete_project)
        {
            return redirect()->action('LoginController@logout')  ;
        }
        else
        {
            $register_project=DB::table('registerprocurement')->join('anouce_project','anouce_project.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')
                ->where('registerprocurement.id',$data->Pro_Fid)
                ->get();

            $offer_company_List=CompanyContact::where('Off_Fid',$data->id)->get();




            return view('Register_Offer_Company.Edit',compact('data','register_project','offer_company_List'));
        }


    }


    public  function  View($id)
    {

        $data=OfferCompany::find($id);

        $offer_company_List=CompanyContact::where('Off_Fid',$data->id)->get();
        return view('Register_Offer_Company.view',compact('data','offer_company_List'));
    }
    public  function  print($id)
    {

        $data=OfferCompany::find($id);

        $offer_company_List=CompanyContact::where('Off_Fid',$data->id)->get();
        return view('Register_Offer_Company.print',compact('data','offer_company_List'));
    }

}
