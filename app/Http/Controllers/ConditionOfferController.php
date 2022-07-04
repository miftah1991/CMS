<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConditionOffer;
use Illuminate\Support\Facades\DB;
use App\RegisterProcurement;

class ConditionOfferController extends Controller
{
    public  function  index()
    {
        $register_project = DB::table('registerprocurement')->join('anouce_project', 'anouce_project.Pro_Fid', 'registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id', 'desc')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->get();


        return view('ConditionOffer.index',compact('register_project'));
    }
    public  function  store(Request $request)
    {



        if($request->hasFile('positionfile'))
        {

            $position_file=$request->file('positionfile');
            $Requst_Image = $position_file->getClientOriginalName();
            $Extension = $position_file->getClientOriginalExtension();
            $positionfile=  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;

            $position_file->storeAs('public/conditionoffer_Files', $positionfile);




        }
        else
        {
            $positionfile='';
        }


        if($request->hasFile('Tazmin'))
        {

            $Tazmin_File=$request->file('Tazmin');
            $Requst_Image = $Tazmin_File->getClientOriginalName();
            $Extension = $Tazmin_File->getClientOriginalExtension();
            $Tazmin =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;

            $Tazmin_File->storeAs('public/conditionoffer_Files', $Tazmin);

        }

        else
        {
            $Tazmin='';
        }

        if($request->hasFile('Offer_File'))
        {

            $Offer_File=$request->file('Offer_File');
            $Requst_Image = $Offer_File->getClientOriginalName();
            $Extension = $Offer_File->getClientOriginalExtension();
            $OfferFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Offer_File->storeAs('public/conditionoffer_Files', $Tazmin);

        }

        else
        {
            $OfferFile='';
        }





      $ConditionOffer= new ConditionOffer();
        $ConditionOffer->Pro_Fid      =$request->Pro_Fid     ;
        $ConditionOffer->Save_Date    =$request->Save_Date   ;
        $ConditionOffer->Name         =$request->Name        ;
        $ConditionOffer->Jawaz        =$request->Jawaz       ;
        $ConditionOffer->MemberName   =$request->MemberName  ;
        $ConditionOffer->position     =$request->position    ;
        $ConditionOffer->positionfile =$positionfile;
        $ConditionOffer->Offer_File =$Offer_File;
        $ConditionOffer->Phone        =$request->Phone       ;
        $ConditionOffer->Email        =$request->Email       ;
        $ConditionOffer->Tazmin       =$Tazmin      ;
        $ConditionOffer->Start_Date   =$request->Start_Date  ;
        $ConditionOffer->End_Date     =$request->End_Date    ;
        $ConditionOffer->remark       =$request->remark      ;
        $ConditionOffer->save();
        if($ConditionOffer->save())
        {
            return back()->with('msg','معلومات شما ثپت شد');
        }

    }
    public  function  List()
    {
        $data=DB::table('conditionoffer')->join('registerprocurement', 'registerprocurement.id', 'conditionoffer.Pro_Fid')
            ->select(DB::raw('count(conditionoffer.Pro_Fid) as total'),'registerprocurement.Pro_Code','registerprocurement.id')

            ->groupBy('registerprocurement.Pro_Code','registerprocurement.id')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)
            ->
            get();
        
        return view('ConditionOffer.List',compact('data'));
    }
    public  function  Find_Total_Condition_Offer_List($id)
    {
$data=ConditionOffer::where('Pro_Fid',$id)->get();

        return view('ConditionOffer.view',compact('data'));
    }

    public  function  Edit($id)
    {
        $data=ConditionOffer::where('id',$id)->first();

        $register_project=RegisterProcurement::where('id',$data->Pro_Fid)->get();

        return view('ConditionOffer.Edit',compact('data','register_project'));

    }
    public  function  Update(Request $request)
    {

        $ConditionOffer= new ConditionOffer();

        if($request->hasFile('positionfile'))
        {

            $position_file=$request->file('positionfile');
            $Requst_Image = $position_file->getClientOriginalName();
            $Extension = $position_file->getClientOriginalExtension();
            $positionfile=  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;

            $position_file->storeAs('public/conditionoffer_Files', $positionfile);




        }
        else
        {
            $positionfile=$request->positionfile;
        }


        if($request->hasFile('Tazmin'))
        {

            $Tazmin_File=$request->file('Tazmin');
            $Requst_Image = $Tazmin_File->getClientOriginalName();
            $Extension = $Tazmin_File->getClientOriginalExtension();
            $Tazmin =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;

            $Tazmin_File->storeAs('public/conditionoffer_Files', $Tazmin);

        }

        else
        {
            $Tazmin=$request->Tazmin;
        }

        if($request->hasFile('Offer_File'))
        {

            $Offer_File=$request->file('Offer_File');
            $Requst_Image = $Offer_File->getClientOriginalName();
            $Extension = $Offer_File->getClientOriginalExtension();
            $OfferFile =  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Offer_File->storeAs('public/conditionoffer_Files', $Tazmin);

        }

        else
        {
            $OfferFile=$request->OfferFile;
        }






        $ConditionOffer=ConditionOffer::where('id',$request->id)->first();
        $ConditionOffer->Pro_Fid      =$request->Pro_Fid     ;
        $ConditionOffer->Save_Date    =$request->Save_Date   ;
        $ConditionOffer->Name         =$request->Name        ;
        $ConditionOffer->Jawaz        =$request->Jawaz       ;
        $ConditionOffer->MemberName   =$request->MemberName  ;
        $ConditionOffer->position     =$request->position    ;
        $ConditionOffer->positionfile =$positionfile;
        $ConditionOffer->Offer_File =$OfferFile;

        $ConditionOffer->Phone        =$request->Phone       ;
        $ConditionOffer->Email        =$request->Email       ;
        $ConditionOffer->Tazmin       =$Tazmin      ;
        $ConditionOffer->Start_Date   =$request->Start_Date  ;
        $ConditionOffer->End_Date     =$request->End_Date    ;
        $ConditionOffer->remark       =$request->remark      ;
        $ConditionOffer->save();
        if($ConditionOffer->save())
        {
            return back()->with('msg','معلومات شما تغیر شد');
        }


    }
}
