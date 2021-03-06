<?php

namespace App\Http\Controllers;

use App\AounceProjectMemberList;
use App\Contract;
use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailer;
use App\AnouceProject;
use App\ContractCompany;
use App\ExtandProject;
use App\Evaluation;
class MailController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
    }




    public  function  Send_Mail_Eval_Time($id)
    {
        $regid=Evaluation::where('id',$id)->first();
        $data=Email::where('Pro_Fid',$regid->Pro_Fid)->where('tablename','Eval')->get();

        return view('Email_Time.Email_Eval_Time',compact('id','data'));
    }


    public  function  Send_Item_Email($id)
    {

       $contid=Contract::where('id',$id)->first();

        $data=Email::where('Pro_Fid',$contid->Pro_Fid)->where('tablename','Cont')->get();

        return view('Email_Time.Email_Item_Contract',compact('id','data'));

    }


    public  function  Send_Mail_Tazmin($id)
    {

        $contid=Contract::where('id',$id)->first();

        $data=Email::where('Pro_Fid',$contid->Pro_Fid)->where('tablename','Cont')->get();

        return view('Email_Time.Email_Tazmin_Contract',compact('id','data'));

    }





    public  function Send_Mail_Extand($id)
    {

        $regid=ExtandProject::where('id',$id)->first();
        $data=Email::where('Pro_Fid',$regid->Pro_Fid)->where('tablename','Ext')->get();
        return view('Email_Time.Email_Extand',compact('id','data'));

    }


    public  function  Send_Mail_Offer($id)
    {

        $regid=AnouceProject::where('id',$id)->first();

        $data=Email::where('Pro_Fid',$regid->Pro_Fid)->where('tablename','Ano')->get();
        return view('Email_Time.Email_Offer',compact('id','data'));
    }


    public  function  Send_Mail_Contract($id)
    {
        $regid=Contract::where('id',$id)->first();


        $data=Email::where('Pro_Fid',$regid->Pro_Fid)->where('tablename','Cont')->get();

        return view('Email_Time.Email_Contract',compact('id','data'));

    }






    public  function Insert_Email_Eval_Time(Request $request)
    {


        if($request->type==3) {
            $emaill = array();
            $details=array();
            $Data_Eval_Time = DB::table('evaluation')->join('registerprocurement', 'registerprocurement.id', 'evaluation.Pro_Fid')
                ->select('evaluation.*', 'registerprocurement.Project_Name', 'registerprocurement.Pro_Code','registerprocurement.id as ProID')->where('registerprocurement.is_complete', 0)
                ->where('registerprocurement.reject_id', 0)
                ->where('evaluation.id', $request->id)
                ->get();


            // $Data_Eval= Evaluation::orderBy('id', 'desc')->get();


            foreach ($Data_Eval_Time as $rcd) {


                $emaildata = AounceProjectMemberList::where('Eval_Fid', $rcd->id)->get();

                foreach ($emaildata as $emircd) {

                    $details = [
                        'Project_Name' => $rcd->Project_Name,
                        'Pro_Code' => $rcd->Pro_Code,
                        'Start_Date'=>$rcd->Start_Date,
                        'Eval_Place'=>$rcd->Eval_Place,
                        'time' => $request->time,
                    ];
                    $emaill[]=$emircd->Email;




                }
                Mail::send('Email.Email_Evaluation' , ['Project_Name'=>$details['Project_Name'],'Pro_Code'=>$details['Pro_Code'],'Eval_Place'=>$details['Eval_Place'],'Start_Date'=>$details['Start_Date'],'time'=>$details['time']], function($message) use ($emaill)
                {
                    $message->to($emaill)->subject('?????????? ?????????? ???? ???????? ??????????????');
                    $message->cc('khaled.mashkoori@dabs.af')->subject('?????????? ?????????? ???? ???????? ?????????????? ');
                    $message->cc('siamak.g@dabs.af')->subject('?????????? ?????????? ???? ???????? ?????????????? ');
                });

                $Email = new Email();
                $Email->Subject = $request->Subject;
                $Email->Remakrs = $request->Remakrs;
                $Email->Pro_Fid = $rcd->ProID;
                $Email->tablename ='Eval';
                $Email->Type = '?????????? ?????????? ???? ???????? ??????????????';
                $Email->time = $request->time;
                $Email->Date = $request->Date;
                $Email->save();

            }
            $evalution=Evaluation::where('id',$request->id)->first();
            $evalution->eval_email=1;
            $evalution->save();


            return back()->with('msg', '???????? ?????? ?????????? ????');
        }
        else
        {
            $emaill = array();
            $details=array();

            $Data_Eval_Time = DB::table('evaluation')->join('registerprocurement', 'registerprocurement.id', 'evaluation.Pro_Fid')
                ->select('evaluation.*', 'registerprocurement.Project_Name', 'registerprocurement.Pro_Code','registerprocurement.id as ProID')->where('registerprocurement.is_complete', 0)
                ->where('registerprocurement.reject_id', 0)
                ->where('evaluation.id', $request->id)
                ->get();

            // $Data_Eval= Evaluation::orderBy('id', 'desc')->get();


            foreach ($Data_Eval_Time as $rcd) {


                $emaildata = AounceProjectMemberList::where('Eval_Fid', $rcd->id)->get();

                foreach ($emaildata as $emircd) {

                    $details = [
                        'Project_Name' => $rcd->Project_Name,
                        'Pro_Code' => $rcd->Pro_Code,
                        'day' => $request->Day,
                    ];

                    $emaill[]=$emircd->Email;



                }
                Mail::send('Email.Email_Evaluation_Time' , ['Project_Name'=>$details['Project_Name'],'Pro_Code'=>$details['Pro_Code'],'day'=>$details['day']], function($message) use ($emaill)
                {
                    $message->to($emaill)->subject('???????? ?????? ?????????????? ????????????');
                    $message->cc('khaled.mashkoori@dabs.af')->subject('???????? ?????? ?????????????? ???????????? ');
                    $message->cc('siamak.g@dabs.af')->subject('???????? ?????? ?????????????? ???????????? ');
                });

            }

            $Email = new Email();
            $Email->Subject = $request->Subject;
            $Email->Remakrs = $request->Remakrs;
            $Email->Pro_Fid = $rcd->ProID;
            $Email->tablename ='Eval';
            $Email->Type = '???????? ?????? ?????????????? ????????????';
            $Email->Day = $request->Day;
            $Email->Date = $request->Date;
            $Email->save();

            if($request->Day==10)
            {
                $evalution=Evaluation::where('id',$request->id)->first();
                $evalution->eval_ten=1;
                $evalution->save();
            }
            if($request->Day==15)
            {
                $evalution=Evaluation::where('id',$request->id)->first();
                $evalution->eval_15=1;
                $evalution->save();
            }
            if($request->Day==20)
            {
                $evalution=Evaluation::where('id',$request->id)->first();
                $evalution->eval_20=1;
                $evalution->save();
            }
            if($request->Day==30)
            {
                $evalution=Evaluation::where('id',$request->id)->first();
                $evalution->eval_30=1;
                $evalution->save();
            }



            return back()->with('msg', '???????? ?????? ?????????? ????');




        }

    }





    function Insert_Email_Offer(Request $request)
    {



        if($request->type==1)
        {

            $emaill = array();
            $details=array();
            $data = DB::table('anouce_project')->join('registerprocurement', 'registerprocurement.id', 'anouce_project.Pro_Fid')
                ->select('anouce_project.*', 'registerprocurement.Project_Name', 'registerprocurement.Pro_Code','registerprocurement.id as ProID')->where('registerprocurement.is_complete', 0)
                ->where('registerprocurement.reject_id', 0)
                ->where('anouce_project.id', $request->id)
                ->get();
            foreach ($data as $rcd) {


                $emaildata = AounceProjectMemberList::where('Ano_Fid', $rcd->id)->get();

                foreach ($emaildata as $key=>$emircd) {
                    $details = [
                        'Project_Name' => $rcd->Project_Name,
                        'Pro_Code' => $rcd->Pro_Code,
                        'Offer_Place' => $rcd->Offer_Place,
                        'Met_Date' => $rcd->Met_Date,
                        'time' => $request->time,
                    ];
                    $emaill[]=$emircd->Email;



                }




                Mail::send('Email.Email_Before_Metting' , ['Project_Name'=>$details['Project_Name'],'Pro_Code'=>$details['Pro_Code'],'Offer_Place'=>$details['Offer_Place'],'Met_Date'=>$details['Met_Date'],'time'=>$details['time']], function($message) use ($emaill)
                {
                    $message->to($emaill)->subject('???????? ???????? ?????? ???? ?????????????? ');
                    $message->cc('khaled.mashkoori@dabs.af')->subject('???????? ???????? ?????? ???? ?????????????? ');
                    $message->cc('siamak.g@dabs.af')->subject('?????????? ?????????? ???????????? ???? ?????? ?????????? ?????????????? ');
                });





                //   \Mail::to($emircd->Email)->cc('ziaurrahmanfaroqi002@gmail.com')->send(new \App\Mail\Before_Metting($details));


            }

            $offer_AnouceProject=AnouceProject::where('id',$request->id)->first();
            $offer_AnouceProject->met_email=1;
            $offer_AnouceProject->save();




            $Email = new Email();
            $Email->Subject = $request->Subject;
            $Email->Remakrs = $request->Remakrs;
            $Email->Pro_Fid = $rcd->ProID;
            $Email->tablename ='Ano';
            $Email->Type = '???????? ???????? ?????? ???? ?????????????? ';
            $Email->time = $request->time;
            $Email->Date = $request->Date;
            $Email->save();


            return back()->with('msg', '???????? ?????? ?????????? ????');
        }

        else
        {

            $emaill = array();
            $details=array();


            //offer Email
            $data = DB::table('anouce_project')->join('registerprocurement', 'registerprocurement.id', 'anouce_project.Pro_Fid')
                ->select('anouce_project.*', 'registerprocurement.Project_Name', 'registerprocurement.Pro_Code','registerprocurement.id as ProID')->where('registerprocurement.is_complete', 0)
                ->where('registerprocurement.reject_id', 0)
                ->where('anouce_project.id', $request->id)
                ->get();


            foreach ($data as $rcd) {



                $emaildata = AounceProjectMemberList::where('Ano_Fid', $rcd->id)->get();

                foreach ($emaildata as $emircd) {
                    $details = [
                        'Project_Name' => $rcd->Project_Name,
                        'Pro_Code' => $rcd->Pro_Code,
                        'Offer_Place' => $rcd->Offer_Place,
                        'Offer_Date' => $rcd->Offer_Date,
                        'time' => $request->time,
                    ];

                    $emaill[]=$emircd->Email;



                }

                Mail::send('Email.Email_Offer' , ['Project_Name'=>$details['Project_Name'],'Pro_Code'=>$details['Pro_Code'],'Offer_Place'=>$details['Offer_Place'],'Offer_Date'=>$details['Offer_Date'],'time'=>$details['time']], function($message) use ($emaill)
                {
                    $message->to($emaill)->subject('?????????? ?????????? ???? ???????? ???????? ????????????????');
                    $message->cc('khaled.mashkoori@dabs.af')->subject('?????????? ?????????? ???? ???????? ???????? ????????????????');
                    $message->cc('siamak.g@dabs.af')->subject('?????????? ?????????? ???????????? ???? ?????? ?????????? ?????????????? ');
                });



                $offer_AnouceProject=AnouceProject::where('id',$request->id)->first();
                $offer_AnouceProject->offer_email=1;
                $offer_AnouceProject->save();

                $offer_AnouceProject=AnouceProject::where('id',$request->id)->first();
                $offer_AnouceProject->offer_email=1;
                $offer_AnouceProject->save();
                $Email = new Email();
                $Email->Subject = $request->Subject;
                $Email->Remakrs = $request->Remakrs;
                $Email->Pro_Fid = $rcd->ProID;
                $Email->tablename ='Ano';
                $Email->Type = '?????????? ?????????? ???? ???????? ???????? ????????????????';
                $Email->time = $request->time;
                $Email->Date = $request->Date;
                $Email->save();

            }




            return back()->with('msg', '???????? ?????? ?????????? ????');



        }


    }



    public  function  Insert_Email_Contract(Request $request)
    {


        if($request->type==5) {
            $emaill = array();
            $details=array();

            $data = DB::table('contract')->join('registerprocurement', 'registerprocurement.id', 'contract.Pro_Fid')
                ->select('contract.*', 'registerprocurement.Project_Name', 'registerprocurement.Pro_Code' ,'registerprocurement.id as ProID')->where('registerprocurement.is_complete', 0)
                ->where('registerprocurement.reject_id', 0)
                ->where('contract.id', $request->id)
                ->get();

            foreach ($data as $rcd) {


                $emaildata = AounceProjectMemberList::where('Con_Fid', $rcd->id)->get();

                foreach ($emaildata as $emircd) {
                    $details = [
                        'Project_Name' => $rcd->Project_Name,
                        'Pro_Code' => $rcd->Pro_Code,
                        'Contract_Place' => $rcd->Contract_Place,
                        'time' => $request->time,
                    ];
                    $emaill[]=$emircd->Email;

                }



                Mail::send('Email.Email_Contract' , ['Project_Name'=>$details['Project_Name'],'Pro_Code'=>$details['Pro_Code'],'Contract_Place'=>$details['Contract_Place'],'time'=>$details['time']], function($message) use ($emaill)
                {
                    $message->to($emaill)->subject('?????????? ?????????? ??????????  ???? ?????? ???????????? ?? ??????????');
                    $message->cc('khaled.mashkoori@dabs.af')->subject('?????????? ?????????? ??????????  ???? ?????? ???????????? ?? ??????????');
                    $message->cc('siamak.g@dabs.af')->subject('?????????? ?????????? ??????????  ???? ?????? ???????????? ?? ?????????? ');
                });

                $Email = new Email();
                $Email->Subject = $request->Subject;
                $Email->Remakrs = $request->Remakrs;
                $Email->Pro_Fid = $rcd->ProID;
                $Email->time = $request->time;
                $Email->tablename = 'Cont';
                $Email->Type = '?????????? ?????????? ??????????  ???? ?????? ???????????? ?? ??????????';
                $Email->Date = $request->Date;
                $Email->save();

            }

            $ContractCompany=ContractCompany::where('id',$request->id)->first();
            $ContractCompany->contract_email=1;
            $ContractCompany->save();


        }
        else
        {

            $emaill = array();
            $details=array();

            $data = DB::table('contract')->join('registerprocurement', 'registerprocurement.id', 'contract.Pro_Fid')
                ->select('contract.*', 'registerprocurement.Project_Name', 'registerprocurement.Pro_Code','registerprocurement.id as ProID')->where('registerprocurement.is_complete', 0)
                ->where('registerprocurement.reject_id', 0)
                ->where('contract.id', $request->id)
                ->get();

            foreach ($data as $rcd) {


                $emaildata = AounceProjectMemberList::where('Con_Fid', $rcd->id)->get();

                foreach ($emaildata as $emircd) {
                    $details = [
                        'Project_Name' => $rcd->Project_Name,
                        'Pro_Code' => $rcd->Pro_Code,
                        'Day' => $request->Day,
                    ];

                    $emaill[]=$emircd->Email;
                }

                Mail::send('Email.Email_Contract_Time' , ['Project_Name'=>$details['Project_Name'],'Pro_Code'=>$details['Pro_Code'],'Day'=>$details['Day']], function($message) use ($emaill)
                {
                    $message->to($emaill)->subject('?????????? ?????????? ???????????? ???? ?????? ???????????? ?? ??????????');
                    $message->cc('khaled.mashkoori@dabs.af')->subject('?????????? ?????????? ???????????? ???? ?????? ???????????? ?? ??????????');
                    $message->cc('siamak.g@dabs.af')->subject('?????????? ?????????? ???????????? ???? ?????? ?????????? ?????????????? ');
                });




            }

            if($request->Day==10)
            {

                $ContractCompany=ContractCompany::where('id',$request->id)->first();
                $ContractCompany->con_10=1;
                $ContractCompany->save();

            }
            if($request->Day==15)
            {

                $ContractCompany=ContractCompany::where('id',$request->id)->first();
                $ContractCompany->con_15=1;
                $ContractCompany->save();

            }
            if($request->Day==20)
            {

                $ContractCompany=ContractCompany::where('id',$request->id)->first();
                $ContractCompany->con_20=1;
                $ContractCompany->save();

            }
            if($request->Day==30)
            {

                $ContractCompany=ContractCompany::where('id',$request->id)->first();
                $ContractCompany->con_30=1;
                $ContractCompany->save();

            }
            $Email = new Email();
            $Email->Subject = $request->Subject;
            $Email->Remakrs = $request->Remakrs;
            $Email->Pro_Fid = $rcd->ProID;
            $Email->Day = $request->Day;
            $Email->tablename = 'Cont';
            $Email->Type = '?????????? ?????????? ???????????? ???? ?????? ???????????? ?? ?????????? ';
            $Email->Date = $request->Date;
            $Email->save();

        }
        return back()->with('msg', '???????? ?????? ?????????? ????');

    }



    public  function  Insert_Email_Tazmin_Contract(Request $request)
    {



        $emaill = array();
        $details = array();

        $data = DB::table('contract')->join('registerprocurement', 'registerprocurement.id', 'contract.Pro_Fid')
            ->select('contract.*', 'registerprocurement.Project_Name', 'registerprocurement.Pro_Code', 'registerprocurement.id as ProID')->where('registerprocurement.is_complete', 0)
            ->where('registerprocurement.reject_id', 0)
            ->where('contract.id', $request->id)
            ->get();

        foreach ($data as $rcd) {

            $emaildata = ContractCompany::where('Con_Fid', $rcd->id)->get();

            foreach ($emaildata as $emircd) {
                $details = [
                    'Project_Name' => $rcd->Project_Name,
                    'Pro_Code' => $rcd->Pro_Code,
                    'Export_End_Date' => $rcd->Export_End_Date,

                ];
                $emaill[] = $emircd->Email;

            }


            Mail::send('Email.Email_Tazmin', ['Project_Name' => $details['Project_Name'], 'Pro_Code' => $details['Pro_Code'], 'Export_End_Date' => $details['Export_End_Date']], function ($message) use ($emaill) {
                $message->to($emaill)->subject('?????????? ?????????? ??????????  ?????????? ??????????');
                $message->cc('khaled.mashkoori@dabs.af')->subject('?????????? ?????????? ??????????  ?????????? ??????????');
                $message->cc('siamak.g@dabs.af')->subject('?????????? ?????????? ??????????   ??????????  ??????????');
            });

            $Email = new Email();
            $Email->Subject = $request->Subject;
            $Email->Remakrs = $request->Remakrs;
            $Email->Pro_Fid = $rcd->ProID;
            $Email->tablename = 'Cont';
            $Email->Type='?????????? ?????????? ??????????  ?????????? ??????????';
            $Email->Date=$request->Date;
            $Email->save();

        }

        $Contract = Contract::where('id', $request->id)->first();
        $Contract->Tazmin_email=1;
        $Contract->save();


        return back()->with('msg', '???????? ?????? ?????????? ????');

    }

    public  function  Insert_Email_Item_Contract(Request $request)
    {



            $emaill = array();
            $details = array();

            $data = DB::table('contract')->join('registerprocurement', 'registerprocurement.id', 'contract.Pro_Fid')
                ->select('contract.*', 'registerprocurement.Project_Name', 'registerprocurement.Pro_Code', 'registerprocurement.id as ProID')->where('registerprocurement.is_complete', 0)
                ->where('registerprocurement.reject_id', 0)
                ->where('contract.id', $request->id)
                ->get();

            foreach ($data as $rcd) {

                $emaildata = ContractCompany::where('Con_Fid', $rcd->id)->get();

                foreach ($emaildata as $emircd) {
                    $details = [
                        'Project_Name' => $rcd->Project_Name,
                        'Pro_Code' => $rcd->Pro_Code,
                        'Date_To_Item' => $rcd->Date_To_Item,

                    ];
                    $emaill[] = $emircd->Email;

                }


                Mail::send('Email.Email_Item', ['Project_Name' => $details['Project_Name'], 'Pro_Code' => $details['Pro_Code'], 'Date_To_Item' => $details['Date_To_Item']], function ($message) use ($emaill) {
                    $message->to($emaill)->subject('?????????? ?????????? ??????????  ?????????? ?????????? ??????????????');
                    $message->cc('khaled.mashkoori@dabs.af')->subject('?????????? ?????????? ??????????  ?????????? ?????????? ??????????????');
                    $message->cc('siamak.g@dabs.af')->subject('?????????? ?????????? ??????????  ?????????? ?????????? ?????????????? ');
                });

                $Email = new Email();
                $Email->Subject = $request->Subject;
                $Email->Remakrs = $request->Remakrs;
                $Email->Pro_Fid = $rcd->ProID;
                $Email->time = $request->time;
                $Email->tablename = 'Cont';
                $Email->Type='?????????? ?????????? ??????????  ?????????? ?????????? ??????????????';
                $Email->Date=$request->Date;
                $Email->save();

            }

            $Contract = Contract::where('id', $request->id)->first();
            $Contract->item_email=1;
            $Contract->save();


        return back()->with('msg', '???????? ?????? ?????????? ????');

    }












    public function  Insert_Mail_Extand(Request $request)
    {
        if($request->type==7)
        {
            $emaill = array();
            $details=array();

            $data = DB::table('extendproject')->join('registerprocurement', 'registerprocurement.id', 'extendproject.Pro_Fid')
                ->select('extendproject.*', 'registerprocurement.Project_Name', 'registerprocurement.Pro_Code','registerprocurement.id as ProID')->where('registerprocurement.is_complete', 0)
                ->where('registerprocurement.reject_id', 0)
                ->where('extendproject.id', $request->id)
                ->get();

            foreach ($data as $rcd) {


                $emaildata = AounceProjectMemberList::where('Ext_Fid', $rcd->id)->get();

                foreach ($emaildata as $emircd) {
                    $details = [
                        'Project_Name' => $rcd->Project_Name,
                        'Pro_Code' => $rcd->Pro_Code,
                        'Place' => $rcd->Place,
                        'Start_Date' => $rcd->Start_Date,
                        'time' => $request->time,
                    ];

                    $emaill[]=$emircd->Email;

                }
                Mail::send('Email.Email_Extend' , ['Project_Name'=>$details['Project_Name'],'Place'=>$details['Place'],'Start_Date'=>$details['Start_Date'],'time'=>$details['time']], function($message) use ($emaill)
                {
                    $message->to($emaill)->subject('?????????? ??????????  ???? ?????? ?????????? ?????????????? ');
                    $message->cc('khaled.mashkoori@dabs.af')->subject('?????????? ??????????  ???? ?????? ?????????? ?????????????? ');
                    $message->cc('siamak.g@dabs.af')->subject('?????????? ??????????  ???? ?????? ?????????? ?????????????? ');
                });


                $Email = new Email();
                $Email->Subject = $request->Subject;
                $Email->Remakrs = $request->Remakrs;
                $Email->tablename ='Ext';
                $Email->Pro_Fid = $rcd->ProID;
                $Email->Type = '?????????? ??????????  ???? ?????? ?????????? ?????????????? ';
                $Email->time = $request->time;
                $Email->Date = $request->Date;
                $Email->save();


            }
            $etandproject =ExtandProject::where('id',$request->id)->first();
            $etandproject->extand_email=1;
            $etandproject->save();


            return back()->with('msg', '???????? ?????? ?????????? ????');
        }

        else
        {
            $emaill = array();
            $details=array();
            //Time base Email for Extend project
            $data = DB::table('extendproject')->join('registerprocurement', 'registerprocurement.id', 'extendproject.Pro_Fid')
                ->select('extendproject.*', 'registerprocurement.Project_Name', 'registerprocurement.Pro_Code','registerprocurement.id as ProID')->where('registerprocurement.is_complete', 0)
                ->where('registerprocurement.reject_id', 0)
                ->where('extendproject.id', $request->id)
                ->get();

            foreach ($data as $rcd) {



                $emaildata = AounceProjectMemberList::where('Ext_Fid', $rcd->id)->get();

                foreach ($emaildata as $emircd) {
                    $details = [
                        'Project_Name' => $rcd->Project_Name,
                        'Pro_Code' => $rcd->Pro_Code,
                        'day' => $request->Day,
                    ];

                    $emaill[]=$emircd->Email;



                }
                Mail::send('Email.Email_Extend_Time' , ['Project_Name'=>$details['Project_Name'],'day'=>$details['day']], function($message) use ($emaill)
                {
                    $message->to($emaill)->subject('?????????? ?????????? ???????????? ???? ?????? ?????????? ?????????????? ');
                    $message->cc('khaled.mashkoori@dabs.af')->subject('?????????? ?????????? ???????????? ???? ?????? ?????????? ?????????????? ');
                    $message->cc('siamak.g@dabs.af')->subject('?????????? ?????????? ???????????? ???? ?????? ?????????? ?????????????? ');
                });


                if($request->Day==10)
                {
                    $etandproject =ExtandProject::where('id',$request->id)->first();
                    $etandproject->ext_10=1;
                    $etandproject->save();

                }

                if($request->Day==15)
                {
                    $etandproject =ExtandProject::where('id',$request->id)->first();
                    $etandproject->ext_15=1;
                    $etandproject->save();

                }

                if($request->Day==20)
                {
                    $etandproject =ExtandProject::where('id',$request->id)->first();
                    $etandproject->ext_20=1;
                    $etandproject->save();

                }
                if($request->Day==30)
                {
                    $etandproject =ExtandProject::where('id',$request->id)->first();
                    $etandproject->ext_30=1;
                    $etandproject->save();

                }


                $Email = new Email();
                $Email->Subject = $request->Subject;
                $Email->Remakrs = $request->Remakrs;
                $Email->tablename ='Ext';
                $Email->Pro_Fid = $rcd->ProID;
                $Email->Type = '?????????? ?????????? ???????????? ???? ?????? ?????????? ??????????????';
                $Email->time = $request->time;
                $Email->Date = $request->Date;
                $Email->save();

            }




            return back()->with('msg', '???????? ?????? ?????????? ????');



        }
    }




    public  function  Show_Evaluation_Email()
    {
        $data=Email::where('tablename','Eval')->orderBy('id','desc')->get();

        return view('Evaluation_Project.Email_List',compact('data'));

    }
    public  function  Show_Anounce_Email()
    {
        $data=Email::where('tablename','Ano')->orderBy('id','desc')->get();

        return view('Anounce_Project.Email_List',compact('data'));

    }
    public  function  Show_Contract_Email()
    {
        $data=Email::where('tablename','Cont')->orderBy('id','desc')->get();

        return view('Contract_Company.Email_List',compact('data'));

    }

    public  function  Show_Extand_Email()
    {
        $data=Email::where('tablename','Ext')->orderBy('id','desc')->get();

        return view('Extand_Project.Email_List',compact('data'));

    }
}

