<?php

namespace App\Http\Controllers;

use App\Award;
use App\CompanyContact;
use Illuminate\Http\Request;
use App\RegisterProcurement;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Invoicetype;
use App\Invoice;
use App\CompleteProject;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $register_project=DB::table('registerprocurement')->join('contract','contract.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')
            ->where('registerprocurement.is_complete',0)
            ->where('registerprocurement.reject_id',0)->get();
        $Invoicetype=Invoicetype::orderBy('id','asc')->get();
        return view('Invoice.index',compact('register_project','Invoicetype'));
    }


    public  function  store(Request $request)
    {
        $complete_project=CompleteProject::where('Pro_Fid',$request->Pro_Fid)->first();

        if($complete_project)
        {
            return redirect()->action('LoginController@logout')  ;
        }
        else {


            if ($request->hasFile('Invoice_File')) {

                $Invoice_File = $request->file('Invoice_File');

                $Contract = $Invoice_File->getClientOriginalName();
                $Extension = $Invoice_File->getClientOriginalExtension();

                $InvoiceFile = $Contract . date('mdYHis') . uniqid() . '.' . $Extension;
                $Invoice_File->storeAs('public/Invoice_File', $InvoiceFile);

            } else {
                $InvoiceFile = '';

            }
            if ($request->hasFile('Check_Invvoice_File')) {

                $Check_Invvoice_File = $request->file('Check_Invvoice_File');

                $Contract = $Check_Invvoice_File->getClientOriginalName();
                $Extension = $Check_Invvoice_File->getClientOriginalExtension();

                $CheckInvvoiceFile = $Contract . date('mdYHis') . uniqid() . '.' . $Extension;
                $Check_Invvoice_File->storeAs('public/Invoice_File', $CheckInvvoiceFile);

            } else {
                $Check_Invvoice_File = '';

            }

            $Invoice = new Invoice();


            $Invoice->Save_Date = $request->Save_Date;
            $Invoice->Amount_Invoice = $request->Amount_Invoice;
            $Invoice->Inv_Fid = $request->Inv_Fid;
            $Invoice->Pro_Fid = $request->Pro_Fid;
            $Invoice->Add_id = $request->Add_id;
            $Invoice->Invoice_File = $InvoiceFile;
            $Invoice->Check_Invvoice_File = $Check_Invvoice_File;
            $Invoice->Persantage = $request->Persantage;
            $Invoice->Date_Accept = $request->Date_Accept;
            $Invoice->Add_id = Auth::user()->id;
            if ($Invoice->save()) {
                return back()->with('msg', 'اینوایس شما ثپت شد');
            }


        }



    }

          public  function  List()
          {
              $data=DB::table('registerprocurement')->join('invoice', 'invoice.Pro_Fid', '=', 'registerprocurement.id')

                  ->select(DB::raw('count(invoice.id) as total,registerprocurement.id,registerprocurement.Project_Name,registerprocurement.Pro_Code' ,'registerprocurement.Accepts_Fund'))
                  ->groupBy('invoice.Pro_Fid','registerprocurement.id','registerprocurement.Project_Name','registerprocurement.Pro_Code','registerprocurement.Accepts_Fund')->get();





              return view('Invoice.List',compact('data'));
          }



public  function View($id)
{
    $data=Invoice::where('Pro_Fid',$id)->get();


$project=RegisterProcurement::where('id',$id)->first();

    return view('Invoice.view',compact('data','project'));

}
    public  function print($id)
    {
        $data=Invoice::where('Pro_Fid',$id)->get();

        $project=RegisterProcurement::where('id',$id)->first();

        return view('Invoice.print',compact('data','project'));

    }
public function  Edit($id)
{
    $data=Invoice::find($id);




        $Project_Found=DB::table('registerprocurement')->join('invoice','invoice.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')
            ->where('invoice.id',$id)

            ->first();

        $com_data=CompanyContact::where('Awar_Fid',$data->registerprocurement->award->id)->first();


        $register_project=DB::table('registerprocurement')->join('contract','contract.Pro_Fid','registerprocurement.id')->select('registerprocurement.*')->orderBy('registerprocurement.id','desc')
            ->where('registerprocurement.id',$data->Pro_Fid)->get();
        $Invoicetype=Invoicetype::orderBy('id','asc')->get();
        return view('Invoice.Edit',compact('data','register_project','Invoicetype','com_data','Project_Found'));




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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Update(Request $request)
    {


        if($request->hasFile('Invoice_File')){

            $Invoice_File=$request->file('Invoice_File');

            $Contract = $Invoice_File->getClientOriginalName();
            $Extension = $Invoice_File->getClientOriginalExtension();

            $InvoiceFile =  $Contract.date('mdYHis') . uniqid().'.'.$Extension;
            $Invoice_File->storeAs('public/Invoice_File', $InvoiceFile);

        }
        else
        {
            $InvoiceFile=$request->InvoiceFile;

        }


        if($request->hasFile('Check_Invvoice_File')){

            $Check_Invvoice_File=$request->file('Check_Invvoice_File');

            $Contract = $Check_Invvoice_File->getClientOriginalName();
            $Extension = $Check_Invvoice_File->getClientOriginalExtension();

            $CheckInvvoiceFile =  $Contract.date('mdYHis') . uniqid().'.'.$Extension;
            $Check_Invvoice_File->storeAs('public/Invoice_File', $CheckInvvoiceFile);

        }
        else
        {
            $Check_Invvoice_File=$request->CheckInvvoiceFile;

        }










        $Invoice=Invoice::find($request->id);


        $Invoice-> Save_Date           =$request->Save_Date          ;
        $Invoice-> Amount_Invoice      =$request->Amount_Invoice     ;
        $Invoice-> Inv_Fid             =$request->Inv_Fid            ;
        $Invoice-> Pro_Fid             =$request->Pro_Fid            ;
        $Invoice-> Add_id              =$request->Add_id             ;
        $Invoice-> Invoice_File        =$InvoiceFile      ;
        $Invoice-> Check_Invvoice_File =$Check_Invvoice_File;
        $Invoice-> Persantage           =$request->Persantage          ;
        $Invoice-> Date_Accept         =$request->Date_Accept        ;
        $Invoice-> Add_id         =Auth::user()->id            ;
        if($Invoice->save())
        {
            return back()->with('msg','اینوایس شما تغیر شد');
        }



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
