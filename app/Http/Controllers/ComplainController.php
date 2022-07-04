<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Complain;
use App\CompanyContact;
use App\CompleteProject;
use App\AounceProjectMemberList;
use App\Process;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function   index()

    {
        $register_project=DB::table('registerprocurement')->join('award','award.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->get();

        return view('Complain_Company.index',compact('register_project'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
            'Pro_Fid'=>'required',
            'Save_Date'=>'required',


            'Complain_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc',



        ],
            ['Pro_Fid.required'=>'لطفا پروژه انتخاب کنید',

                'Save_Date.required'=>'لطفا تاریخ داخل کنید',



                'Complain_File.mimes'=>'لطفا اعتراض داوطلبان  اصلی فارمت داخل کنید'



            ]);

        if($request->hasFile('Complain_File')){

            $Complain_File=$request->file('Complain_File');

            $ComplainFile = $Complain_File->getClientOriginalName();
            $Extension = $Complain_File->getClientOriginalExtension();

            $ComplainFile =  $ComplainFile.date('mdYHis') . uniqid().'.'.$Extension;
            $Complain_File->storeAs('public/Complain', $ComplainFile);

        }
        else
        {
            $ComplainFile='';
        }


$Complain= new Complain();




$Complain->Save_Date    =$request->Save_Date    ;
$Complain->Pro_Fid      =$request->Pro_Fid      ;
$Complain->Complain_File=$ComplainFile;
$Complain->remark       =$request->remark       ;
$Complain->created_at   =$request->created_at   ;
$Complain->Add_id   =Auth::user()->id ;

$Complain->save();


        if($Complain->save())
        {

            $process= new Process();
            $process->Pro_Fid=$request->Pro_Fid;
            $process->tblnanme="complain";
            $process->Name="پروژه حالت شرکت اعتراض داوطلبان است";
            $process->save();

        }

if($Complain->save()) {


    $rows = $request->rows;
    if (isset($rows)) {
        $rows = $request->rows;
        foreach ($rows as $row) {
            $OfferCompnayContact= new  CompanyContact();
            $OfferCompnayContact->Name=$row['Name'];
            $OfferCompnayContact->jawaz=$row['Jawaz'];
            $OfferCompnayContact->MemberName=$row['MemberName'];
            $OfferCompnayContact->Phone=$row['Phone'];
            $OfferCompnayContact->Email= $row['Email'];
            $OfferCompnayContact->Com_Fid = $Complain->id;
            $OfferCompnayContact->save();

        }
    }


}
return redirect()->action('ComplainController@List')->with('msg','ریکارد شما ثپت شد');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function List()
    {
       $data=Complain::orderBy('id','desc')->get();

        return view('Complain_Company.List',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Edit($id)
    {

    $data=Complain::find($id);


            $register_project=DB::table('registerprocurement')->join('award','award.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')
                ->where('registerprocurement.id',$data->Pro_Fid)->get();
            $companycontract=CompanyContact::where('Com_Fid',$data->id)->get();

            return view('Complain_Company.Edit',compact('data','register_project','companycontract'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request,[
            'Pro_Fid'=>'required',
            'Save_Date'=>'required',





        ],
            ['Pro_Fid.required'=>'لطفا پروژه انتخاب کنید',

                'Save_Date.required'=>'لطفا تاریخ داخل کنید',





            ]);

        if($request->hasFile('Complain_File')){

            $Complain_File=$request->file('Complain_File');

            $ComplainFile = $Complain_File->getClientOriginalName();
            $Extension = $Complain_File->getClientOriginalExtension();

            $ComplainFile =  $ComplainFile.date('mdYHis') . uniqid().'.'.$Extension;
            $Complain_File->storeAs('public/Complain', $ComplainFile);

        }
        else
        {
            $ComplainFile=$request->ComplainFile;
        }


        $Complain=Complain::find($request->id);




        $Complain->Save_Date    =$request->Save_Date    ;
        $Complain->Pro_Fid      =$request->Pro_Fid      ;
        $Complain->Complain_File=$ComplainFile;
        $Complain->remark       =$request->remark       ;
        $Complain->created_at   =$request->created_at   ;
        $Complain->Add_id   =Auth::user()->id ;

        $Complain->save();
        if($Complain->save()) {


            $rows = $request->rows;
            if (isset($rows)) {
                $rows = $request->rows;
                foreach ($rows as $row) {
                    $OfferCompnayContact= new  CompanyContact();
                    $OfferCompnayContact->Name=$row['Name'];
                    $OfferCompnayContact->jawaz=$row['Jawaz'];
                    $OfferCompnayContact->MemberName=$row['MemberName'];
                    $OfferCompnayContact->Phone=$row['Phone'];
                    $OfferCompnayContact->Email= $row['Email'];
                    $OfferCompnayContact->Com_Fid = $Complain->id;
                    $OfferCompnayContact->save();

                }
            }


        }
        return redirect()->action('ComplainController@List')->with('msg','معلومات شما تغیر شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function View($id)
    {
        $data=Complain::find($id);

        $companyaward= CompanyContact::where('Awar_Fid',$data->id)->first();

//dd($companyaward);
        $offer_company_List=CompanyContact::where('Com_Fid',$data->id)->get();
        return view('Complain_Company.view',compact('data','companyaward','offer_company_List'));
    }
    public function print($id)
    {
        $data=Complain::find($id);

        $companyaward= CompanyContact::where('Awar_Fid',$data->registerprocurement->award->id)->first();
//dd($companyaward);
        $offer_company_List=CompanyContact::where('Com_Fid',$data->id)->get();
        return view('Complain_Company.print',compact('data','companyaward','offer_company_List'));
    }
}
