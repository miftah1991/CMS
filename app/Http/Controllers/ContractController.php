<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;
use App\RegisterProcurement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\CompanyContact;
use App\AounceProjectMemberList;
use App\ContractCompany;
use App\Process;
use App\CompleteProject;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $register_project=DB::table('registerprocurement')->join('complain','complain.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->get();

        return view('Contract_Company.index',compact('register_project'));
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


    public  function  List()
    {
        $data=Contract::orderBy('id','desc')->get();


        return view('Contract_Company.List',compact('data'));
    }


    public  function View($id)
    {


        $data=Contract::find($id);
        //dd($data);
        $Member_List=AounceProjectMemberList::where('Con_Fid',$data->id)->get();

        return view('Contract_Company.View',compact('data','Member_List'));
    }

    public  function print($id)
    {


        $data=Contract::find($id);
        $Member_List=AounceProjectMemberList::where('Con_Fid',$data->id)->get();

        return view('Contract_Company.print',compact('data','Member_List'));
    }

    public function store(Request $request)
    {


        $this->validate($request,[
            'Pro_Fid'=>'required',
            'Start_Date_Contract'=>'required',
            'End_Date_Contract'=>'required',
            'Place_Item'=>'required',
            'Amount'=>'required',
            'Warrenty'=>'required',
            'Date_From_Jawaz'=>'required',
            'Date_To_Jawaz'=>'required',
            'Date_From_Item'=>'required',
            'Date_To_Item'=>'required',

            'Phone'=>'required',
            'Email'=>'required',
            'Date_From_Jawaz'=>'required',
            'Date_To_Jawaz'=>'required',
            'Tin'=>'required',
            'Jawaz'=>'required',

            'Contract_Information_File'=>'mimes:jpeg,jpg,png,gif,pdf,doc',
            'Bill_File'=>'mimes:jpeg,jpg,png,gif,doc,pdf',
            'Term_Cond_File'=>'mimes:jpeg,jpg,png,gif,pdf',
         'Jawaz_File'=>'mimes:jpeg,jpg,png,gif,pdf'




        ],
            ['Pro_Fid.required'=>'لطفا اسم پروژه داخل کنید',
                'Start_Date_Contract.required'=>'لطفا تاریخ اغاز قرارداد داخل کنید',

                'End_Date_Contract.required'=>'لطفا تاریخ ختم قرارداد داخل کنید',
                'Place_Item.required'=>'لطفا محل تسلیمی دهی اجناس کنید',
                'Amount.required'=>'لطفا مقدار تامینات کنید',
                'Warrenty.required'=>'لطفا میعاد ورنتی داخل کنید',

                'Date_From_Item.required'=>'لطفا از تاریخ تسلیمی اجناس کنید',
                'Date_To_Item.required'=>'لطفا الی تاریخ تسلیمی اجناس داخل کنید',
                'Date_From_Jawaz.required'=>'لطفا تاریخ اغاز جواز کنید',
                'Date_To_Jawaz.required'=>'لطفا تاریخ ختم جواز کنید',

                'Tin.required'=>'لطفا تین این نمبر داخل کنید'



            ]);


        if($request->hasFile('Jawaz_File')){

            $Jawaz_File=$request->file('Jawaz_File');

            $Contract = $Jawaz_File->getClientOriginalName();
            $Extension = $Jawaz_File->getClientOriginalExtension();

            $JawazFile=  $Contract.date('mdYHis') . uniqid().'.'.$Extension;
            $Jawaz_File->storeAs('public/Contract', $JawazFile);

        }
        if($request->hasFile('Contract_Information_File')){

            $Contract_Information_File=$request->file('Contract_Information_File');

            $Camison = $Contract_Information_File->getClientOriginalName();
            $Extension = $Contract_Information_File->getClientOriginalExtension();

            $ContractInformationFile =  $Camison.date('mdYHis') . uniqid().'.'.$Extension;
            $Contract_Information_File->storeAs('public/Contract', $ContractInformationFile);

        }

        if($request->hasFile('Bill_File')){

            $Bill_File=$request->file('Bill_File');

            $Offer = $Bill_File->getClientOriginalName();
            $Extension = $Bill_File->getClientOriginalExtension();

            $BillFile =  $Offer.date('mdYHis') . uniqid().'.'.$Extension;
            $Bill_File->storeAs('public/Contract', $BillFile);

        }
        if($request->hasFile('Term_Cond_File')){

            $Term_Cond_File=$request->file('Term_Cond_File');

            $Warrenty = $Term_Cond_File->getClientOriginalName();
            $Extension = $Term_Cond_File->getClientOriginalExtension();

            $TermCondFile =  $Warrenty.date('mdYHis') . uniqid().'.'.$Extension;
            $Term_Cond_File->storeAs('public/Contract', $TermCondFile);

        }
        if($request->hasFile('Warrenty_File')){

            $Warrenty_File=$request->file('Warrenty_File');

            $Warrenty = $Warrenty_File->getClientOriginalName();
            $Extension = $Warrenty_File->getClientOriginalExtension();

            $WarrentyFile =  $Warrenty.date('mdYHis') . uniqid().'.'.$Extension;
            $Warrenty_File->storeAs('public/Contract', $WarrentyFile);

        }
        else
        {
            $WarrentyFile='';
        }
        if($request->hasFile('Helth_File')){

            $Helth_File=$request->file('Helth_File');

            $Helth = $Helth_File->getClientOriginalName();
            $Extension = $Helth_File->getClientOriginalExtension();

            $HelthFile =  $Helth.date('mdYHis') . uniqid().'.'.$Extension;
            $Helth_File->storeAs('public/Contract', $HelthFile);

        }
        else
        {
            $HelthFile='';
        }

        if($request->hasFile('Tazmin_File')){

            $Tazmin_File=$request->file('Tazmin_File');

            $Tazmin = $Tazmin_File->getClientOriginalName();
            $Extension = $Tazmin_File->getClientOriginalExtension();

            $TazminFile =  $Tazmin.date('mdYHis') . uniqid().'.'.$Extension;
            $Tazmin_File->storeAs('public/Contract', $TazminFile);

        }
        else
        {
            $TazminFile='';
        }



        $contract= new Contract();
$contract-> Pro_Fid          =$request->Pro_Fid ;
$contract->Start_Date_Contract      =$request->Start_Date_Contract      ;
$contract->End_Date_Contract        =$request->End_Date_Contract        ;
$contract->Place_Item               =$request->Place_Item               ;
$contract->Amount                   =$request->Amount                   ;
$contract->Warrenty                 =$request->Warrenty                 ;
$contract->Date_From_Item           =$request->Date_From_Item           ;
$contract->Date_To_Item             =$request->Date_To_Item             ;
        $contract->Warrenty_Number=$request->Warrenty_Number;
        $contract->contract_email=0;
        $contract->con_10=0;
        $contract->con_15=0;
        $contract->con_20=0;
        $contract->con_30=0;
        $contract->Warrent_Rupee=$request->Warrent_Rupee;
        $contract->Export_Strat_Date=$request->Export_Strat_Date;
        $contract->Export_End_Date  =$request->Export_End_Date  ;
        $contract->Bank             =$request->Bank             ;
        $contract->rupee =$request->rupee ;
        $contract->Discount=$request->Discount;
        $contract->Net_Amount  =$request->Net_Amount  ;
        $contract->Contract_Place =$request->Contract_Place             ;
        $contract->Tazmin_File=$TazminFile;
        $contract->Helth_File=$HelthFile;
        $contract->Warrenty_File=$WarrentyFile;




$contract->Contract_Information_File=$ContractInformationFile;
$contract->Bill_File                =$BillFile                ;

$contract->Contract_Rupee=$request->Contract_Rupee;
$contract->Term_Cond_File           =$TermCondFile           ;
$contract->remark                   =$request->remark                   ;
$contract->Add_id                   =Auth::user()->id                 ;
$contract->save();
if($contract->save())
{
    $process= new Process();
    $process->Pro_Fid=$request->Pro_Fid;
    $process->Name="حالت قرارداد شرکت شده";
    $process->tblnanme="contract";
    $process->save();
$ContractComapny=new ContractCompany();
    $ContractComapny->Name            =$request->Name            ;
    $ContractComapny->Phone           =$request->Phone           ;
    $ContractComapny->Email           =$request->Email           ;
    $ContractComapny->Jawaz           =$request->Jawaz           ;
    $ContractComapny->Jawaz_File      =$JawazFile    ;
    $ContractComapny->Tin             =$request->Tin             ;
    $ContractComapny->Date_To_Jawaz   =$request->Date_To_Jawaz   ;
    $ContractComapny->Date_From_Jawaz =$request->Date_From_Jawaz ;
    $ContractComapny->Con_Fid         =$contract->id         ;
    $ContractComapny->save();


}


        if($contract->save())
        {

            $rows = $request->rows;
            if(isset($rows))
            {
            foreach ($rows as $row) {
                $List = new AounceProjectMemberList();


                $List->Emp_Code = $row['EmpCode'];
                $List->Phone = $row['Mobile'];
                $List->Emp_Name=$row['Name'];
                $List->Email = $row['Email'];
                $List->Send_Type =3;
                $List->Con_Fid =$contract->id  ;
                $List->save();
            }
            }


        }




        return  redirect()->action('ContractController@List')->with('msg','معومات قرارداد ثپت شد');






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Edit($id)
    {
        $data=Contract::where('id',$id)->first();


            $register_project=DB::table('registerprocurement')->join('complain','complain.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')
                ->where('registerprocurement.id',$data->Pro_Fid)
                ->get();




            $Team_Contact_List=AounceProjectMemberList::where('Con_Fid',$data->id)->get();
            return view('Contract_Company.Edit',compact('data','register_project','Team_Contact_List'));




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Update(Request $request)
    {






        $this->validate($request,[
            'Pro_Fid'=>'required',
            'Start_Date_Contract'=>'required',
            'End_Date_Contract'=>'required',
            'Place_Item'=>'required',
            'Amount'=>'required',
            'Warrenty'=>'required',
            'Date_From_Jawaz'=>'required',
            'Date_To_Jawaz'=>'required',
            'Date_From_Item'=>'required',
            'Date_To_Item'=>'required',



            'Name'=>'required',
            'Phone'=>'required',
            'Email'=>'required',
            'Date_From_Jawaz'=>'required',
            'Date_To_Jawaz'=>'required',
            'Tin'=>'required',
            'Jawaz'=>'required',





        ],
            ['Pro_Fid.required'=>'لطفا اسم پروژه داخل کنید',
                'Start_Date_Contract.required'=>'لطفا تاریخ اغاز قرارداد داخل کنید',

                'End_Date_Contract.required'=>'لطفا تاریخ ختم قرارداد داخل کنید',
                'Place_Item.required'=>'لطفا محل تسلیمی دهی اجناس کنید',
                'Amount.required'=>'لطفا مقدار تامینات کنید',
                'Warrenty.required'=>'لطفا میعاد ورنتی داخل کنید',

                'Date_From_Item.required'=>'لطفا از تاریخ تسلیمی اجناس کنید',
                'Date_To_Item.required'=>'لطفا الی تاریخ تسلیمی اجناس داخل کنید',
                'Date_From_Jawaz.required'=>'لطفا تاریخ اغاز جواز کنید',
                'Date_To_Jawaz.required'=>'لطفا تاریخ ختم جواز کنید',
                'Tin.required'=>'لطفا تین این نمبر داخل کنید'


            ]);


        if($request->hasFile('Jawaz_File')){

            $Jawaz_File=$request->file('Jawaz_File');

            $Contract = $Jawaz_File->getClientOriginalName();
            $Extension = $Jawaz_File->getClientOriginalExtension();

            $JawazFile=  $Contract.date('mdYHis') . uniqid().'.'.$Extension;
            $Jawaz_File->storeAs('public/Contract', $JawazFile);

        }
        else
        {
            $JawazFile=$request->JawazFile;
        }
        if($request->hasFile('Contract_Information_File')){

            $Contract_Information_File=$request->file('Contract_Information_File');

            $Camison = $Contract_Information_File->getClientOriginalName();
            $Extension = $Contract_Information_File->getClientOriginalExtension();

            $ContractInformationFile =  $Camison.date('mdYHis') . uniqid().'.'.$Extension;
            $Contract_Information_File->storeAs('public/Contract', $ContractInformationFile);

        }
        else
        {
            $ContractInformationFile=$request->ContractInformationFile;
        }

        if($request->hasFile('Bill_File')){

            $Bill_File=$request->file('Bill_File');

            $Offer = $Bill_File->getClientOriginalName();
            $Extension = $Bill_File->getClientOriginalExtension();

            $BillFile =  $Offer.date('mdYHis') . uniqid().'.'.$Extension;
            $Bill_File->storeAs('public/Contract', $BillFile);

        }
        else
        {
            $BillFile=$request->BillFile;
        }
        if($request->hasFile('Term_Cond_File')){

            $Term_Cond_File=$request->file('Term_Cond_File');

            $Warrenty = $Term_Cond_File->getClientOriginalName();
            $Extension = $Term_Cond_File->getClientOriginalExtension();

            $TermCondFile =  $Warrenty.date('mdYHis') . uniqid().'.'.$Extension;
            $Term_Cond_File->storeAs('public/Contract', $TermCondFile);

        }
        else
        {
            $TermCondFile=$request->TermCondFile;
        }



        if($request->hasFile('Warrenty_File')){

            $Warrenty_File=$request->file('Warrenty_File');

            $Warrenty = $Warrenty_File->getClientOriginalName();
            $Extension = $Warrenty_File->getClientOriginalExtension();

            $WarrentyFile =  $Warrenty.date('mdYHis') . uniqid().'.'.$Extension;
            $Warrenty_File->storeAs('public/Contract', $WarrentyFile);

        }
        else
        {
            $WarrentyFile=$request->WarrentyFile;
        }
        if($request->hasFile('Helth_File')){

            $Helth_File=$request->file('Helth_File');

            $Helth = $Helth_File->getClientOriginalName();
            $Extension = $Helth_File->getClientOriginalExtension();

            $HelthFile =  $Helth.date('mdYHis') . uniqid().'.'.$Extension;
            $Helth_File->storeAs('public/Contract', $HelthFile);

        }
        else
        {
            $HelthFile=$request->HelthFile;
        }

        if($request->hasFile('Tazmin_File')){

            $Tazmin_File=$request->file('Tazmin_File');

            $Tazmin = $Tazmin_File->getClientOriginalName();
            $Extension = $Tazmin_File->getClientOriginalExtension();

            $TazminFile =  $Tazmin.date('mdYHis') . uniqid().'.'.$Extension;
            $Tazmin_File->storeAs('public/Contract', $TazminFile);

        }
        else
        {
            $TazminFile=$request->TazminFile;
        }

        $contract=Contract::find($request->id);
        $contract-> Pro_Fid          =$request->Pro_Fid ;
        $contract->Start_Date_Contract      =$request->Start_Date_Contract      ;
        $contract->End_Date_Contract        =$request->End_Date_Contract        ;
        $contract->Place_Item               =$request->Place_Item               ;
        $contract->Amount                   =$request->Amount                   ;
        $contract->Warrenty                 =$request->Warrenty                 ;
        $contract->Date_From_Item           =$request->Date_From_Item           ;
        $contract->Date_To_Item             =$request->Date_To_Item             ;
        $contract->Warrent_Rupee=$request->Warrent_Rupee;

        $contract->Warrenty_Number=$request->Warrenty_Number;


        $contract->Export_Strat_Date=$request->Export_Strat_Date;
        $contract->Export_End_Date  =$request->Export_End_Date  ;
        $contract->Bank =$request->Bank             ;
        $contract->rupee =$request->rupee             ;
        $contract->Discount=$request->Discount;
        $contract->Net_Amount  =$request->Net_Amount  ;
        $contract->Contract_Place =$request->Contract_Place             ;

        $contract->Warrent_Rupee=$request->Warrent_Rupee;
        $contract->Warrent_Rupee=$request->Warrent_Rupee;
        $contract->Tazmin_File=$TazminFile;
        $contract->Helth_File=$HelthFile;
        $contract->Warrenty_File=$WarrentyFile;


        $contract->Contract_Rupee=$request->Contract_Rupee;
        $contract->Contract_Information_File=$ContractInformationFile;
        $contract->Bill_File                =$BillFile                ;
        $contract->Term_Cond_File           =$TermCondFile           ;
        $contract->remark                   =$request->remark                   ;
        $contract->Add_id                   =Auth::user()->id                 ;
        $contract->save();
        if($contract->save())
        {

            $ContractComapny=ContractCompany::where('Con_Fid',$request->id)->first();
            $ContractComapny->Name            =$request->Name            ;
            $ContractComapny->Phone           =$request->Phone           ;
            $ContractComapny->Email           =$request->Email           ;
            $ContractComapny->Jawaz           =$request->Jawaz           ;
            $ContractComapny->Jawaz_File      =$JawazFile    ;
            $ContractComapny->Tin             =$request->Tin             ;
            $ContractComapny->Date_To_Jawaz   =$request->Date_To_Jawaz   ;
            $ContractComapny->Date_From_Jawaz =$request->Date_From_Jawaz ;
            $ContractComapny->Con_Fid         =$contract->id         ;
            $ContractComapny->save();


        }


        if($contract->save())
        {

            $rows = $request->rows;



            if (isset($rows))
            {
                foreach ($rows as $row) {
                    $List = new AounceProjectMemberList();


                    $List->Emp_Code = $row['EmpCode'];
                    $List->Phone = $row['Mobile'];
                    $List->Emp_Name=$row['Name'];
                    $List->Email = $row['Email'];
                    $List->Send_Type =3;
                    $List->Con_Fid =$contract->id  ;
                    $List->save();
                }
            }

        }




        return  redirect()->action('ContractController@List')->with('msg','معومات قرارداد تغیر شد');











    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
