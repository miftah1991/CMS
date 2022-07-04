<?php

namespace App\Http\Controllers;

use App\Archive;
use App\Complain;
use App\CompleteProject;
use App\Contract;
use App\Invoice;
use App\RejectProject;
use App\Subpaymant;
use App\Workpersantage;
use Illuminate\Http\Request;
use App\District;
use App\AnouceProject;
use App\CompanyContact;
use App\AounceProjectMemberList;
use App\OfferCompany;
use App\Evaluation;
use App\Award;
use App\RegisterProcurement;
use App\Paymant;
use App\ExandDetails;
use Illuminate\Support\Facades\DB;



class AjaxController extends Controller
{

    public  function  GetDistrict(Request $request)
    {
$Distict=District::where('province_id' ,$request->data)->get();

return response()->json($Distict);

    }

    public  function  Find_Discount(Request $request)
    {
        $data=Contract::where('Pro_Fid',$request->id)->first();

        return response()->json($data);


    }




    public  function  GetListAounce(Request $request)
    {

     $data=AounceProjectMemberList::where('Ano_Fid',$request->data)->get();
     return response()->json($data);


    }


    public  function  Find_Duplicate_Reject_Project(Request $request)
    {

        $data=RejectProject::where('Pro_Fid',$request->Pro_Fid)->where('Stat_Fid',$request->Stat_Fid)->get();


    return response()->json($data);


    }



    public  function  Find_Duplicate_Extand_Details(Request $request)
    {

        $data=ExandDetails::where('Ext_Fid',$request->id)->get();

if($data)
{
    return response()->json($data);
}



    }

    //find complete project

    public  function  Find_Complete_Project(Request $request)
    {
       $data=CompleteProject::where('Pro_Fid',$request->id)->first();
       if($data)
       {
           return response()->json($data);
       }

    }






public  function Find_Project_at_Complete_Persantage(Request $request)
{

    $data=Workpersantage::where('Pro_Fid',$request->id)->sum('Persantage');

    return response()->json($data);


}




    public  function  Find_Sub_Paymant(Request $request)
    {
        $data = Paymant::where('id', $request->id)->first();
        return response()->json($data);
    }



    public  function  Find_Contract_Emplist(Request $request)
    {

        $data=AounceProjectMemberList::where('Con_Fid',$request->data)->get();
        return response()->json($data);


    }




    public  function  Find_Contract_List(Request $request)
    {

        $data=Contract::where('Pro_Fid',$request->id)->first();
        return response()->json($data);


    }

    public  function  Find_Duplicate_Invoice_Type(Request $request)
    {

        $data=Subpaymant::where('Inv_Type_Fid',$request->Inv_Type_Fid)->where('Pay_Fid',$request->Pay_Fid)->where('Pro_Fid',$request->project_Fid)->get();
        return response()->json($data);


    }







    public  function  GetListEval(Request $request)
    {

        $data=AounceProjectMemberList::where('Eval_Fid',$request->data)->get();
        return response()->json($data);


    }



    public  function  Delete_Member_Contact(Request $request)
    {

      $data=  AounceProjectMemberList::find($request->data)->delete();
      return response()->json($data);



    }

    public  function  Delete_Sub_Invoice_List(Request $request)
    {

        $data=Subpaymant::find($request->id)->delete();
        return response()->json($data);
    }


    public  function  Delete_Paymant(Request $request)
    {


        $subpaymant=Subpaymant::where('Pay_Fid',$request->id)->delete();

        $data=Paymant::find($request->id)->delete();
        return response()->json($data);
    }






    public  function  Delete_Member_Contract(Request $request)
    {

        $data=  AounceProjectMemberList::find($request->data)->delete();
        return response()->json($data);



    }



    public  function  Find_Code(Request $request)
    {
        $data=RegisterProcurement::where('id',$request->id)->first();
        return response()->json($data);

    }


    public  function  Find_Found(Request $request)
    {
        $data=RegisterProcurement::where('id',$request->id)->first();
        return response()->json($data);

    }



    public  function  Find_Invoice_Type(Request $request)
    {
        $data=Invoice::where('Inv_Fid',$request->id)->where('Pro_Fid',$request->Pro_Fid)->first();
        return response()->json($data);

    }

    public  function  Check_Amount_Invoice(Request $request)
    {
        $data=Invoice::where('Pro_Fid',$request->id)->get()->sum('Amount_Invoice');
        return response()->json($data);

    }










    public function  Find_Project(Request $request)
    {
        $data=OfferCompany::where('Pro_Fid',$request->id)->first();
        return response()->json($data);
    }
public  function  Find_Offer_Company(Request $request)
{

    $data=CompanyContact::where('Off_Fid',$request->data)->get();

    return response()->json($data);

}



public  function  Find_SubInvoice_List(Request $request)
{
    $data = Paymant::where('Pro_Fid',$request->id)->get();
    return response()->json($data);
}

public  function  Find_Sreach_Itme(Request $request)
{

    $data = Paymant::where('Details','like',$request->val.'%')->get();
    return response()->json($data);
}

public  function  Find_Contract_Rupee(Request $request)
{
    $data = Contract::where('Pro_Fid',$request->id)->first();
    return response()->json($data);

}


    public  function  Find_Award_Company(Request $request)
    {


     //   $adata=Award::where('id',$request->id)->first();
        $data=CompanyContact::where('Awar_Fid',$request->id)->first();

        return response()->json($data);

    }


    public  function  Find_Company_Award_Table(Request $request)
    {


          $adata=Award::where('Pro_Fid',$request->id)->first();
        $data=CompanyContact::where('Awar_Fid',$adata->id)->first();

        return response()->json($data);

    }
    public  function  Find_Complain_Comapny(Request $request)
    {

        $data=CompanyContact::where('Com_Fid',$request->data)->get();

        return response()->json($data);

    }


    public  function  Delete_CompanyContact(Request $request)
{

    $data=CompanyContact::find($request->id)->delete();
    return response()->json($data);
}



    public  function  Delete_Complain_Company(Request $request)
    {

        $data=CompanyContact::find($request->id)->delete();
        return response()->json($data);
    }


public function  Find_Project_at_Evaluation(Request $request)
{
    $data=Evaluation::where('Pro_Fid',$request->id)->first();
    return response()->json($data);

}



    public function  Find_Project_at_Complain(Request $request)
    {
        $data=Complain::where('Pro_Fid',$request->id)->first();
        return response()->json($data);

    }


    public function  Find_Project_at_Contract(Request $request)
    {
        $data=Contract::where('Pro_Fid',$request->id)->first();
        return response()->json($data);

    }



    public function  Find_Project_at_Complete(Request $request)
    {
        $data=CompleteProject::where('Pro_Fid',$request->id)->first();
        return response()->json($data);

    }
    public function  Find_Project_at_Award(Request $request)
    {
        $data=Award::where('Pro_Fid',$request->id)->first();
        return response()->json($data);

    }


    public function  Find_Project_at_Anounce(Request $request)
    {
        $data=AnouceProject::where('Pro_Fid',$request->id)->first();
        return response()->json($data);

    }


    public function  Find_Complain_Company(Request $request)
    {
        $data=Award::where('Pro_Fid',$request->id)->first();
        $data=CompanyContact::where('Awar_Fid',$data->id)->first();

        return response()->json($data);
    }


    public function  Find_Project_Type(Request $request)
    {
        $data=RegisterProcurement::where('id',$request->id)->first();

        return response()->json($data->procurementtype->ProName);
    }



public  function  Find_Sub_Invoice_List(Request $request)
{


    $data=DB::table('invoicetype')->join('subpaymant','subpaymant.Inv_Type_Fid','invoicetype.id')

               ->join('paymant','paymant.id','subpaymant.Pay_Fid')
        ->select('invoicetype.name','subpaymant.*')
        ->where('subpaymant.Pay_Fid',$request->Pay_Fid)

        ->orderBy('Inv_Type_Fid','asc')
        ->get();
    return response()->json($data);
}


public  function  Find_Total_Unite_Sub_Invoice(Request $request)
{

    $data=Subpaymant::where('Pay_Fid',$request->Pay_Fid)->sum('Inv_unit');
    return response()->json($data);

}

}


