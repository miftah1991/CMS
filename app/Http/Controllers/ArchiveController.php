<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Archive_location;
use App\Archive;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Company;
class ArchiveController extends Controller
{
    public  function  index()
    {
        $Location=Archive_location::all();
$company=Company::all();

        return view('Archive.index',compact('Location','company'));

    }

    public  function  Search_Archive()
    {
        $Location=Archive_location::all();

        $company=Company::all();
        return view('Archive.Search_Archive',compact('Location','company'));

    }

public  function  Archive_Location()
{
    $Location=Archive_location::all();
    return view('Archive.Archive_Location',compact('Location'));
}

    public  function  Add_Archive_Location(Request $request)
    {

        $Archive_Location=new Archive_location();
        $Archive_Location->name=$request->name;
        $Archive_Location->save();
        if($Archive_Location->save())
        {
            return back()->with('msg','ریکارد شما ثبت شد');
        }

    }

    public  function  Edit_Archive_Location($id)
    {
       $data=Archive_location::find($id);
        $Location=Archive_location::all();

       return view('Archive.Edit_Archive_Location',compact('data','Location'));

    }

    public  function  Update_Archive_Location(Request $request)
    {
        $Archive_Location=Archive_location::find($request->id);
        $Archive_Location->name=$request->name;
        $Archive_Location->save();
        if($Archive_Location->save())
        {
            return back()->with('msg','ریکارد شما تغیر شد');

        }

    }


    public  function  Get_Project_Code(Request $request)
    {


        $data=DB::table('archive')->join('archive_location','archive_location.id','archive.Arc_Fid')
            ->join('company','company.id','archive.Com_Fid')
            ->select('archive.Project_Code','archive.Year','archive.Pages','archive_location.name','company.Name','archive.Project_File')
            ->where('Project_Code','like',$request->code.'%')->get();
        return response()->json($data);
    }


// Find Archvie by Company
    public  function  Get_Project_Arc_Com_Fid(Request $request)
    {

        $data=DB::table('archive')->join('archive_location','archive_location.id','archive.Arc_Fid')
            ->join('company','company.id','archive.Com_Fid')
            ->select('archive.Project_Code','archive.Year','archive.Pages','archive_location.name','company.Name','archive.Project_File')
            ->where('Com_Fid',$request->code)->get();
        return response()->json($data);

    }


    public  function  Get_Project_Year(Request $request)
    {


        $data=DB::table('archive')->join('archive_location','archive_location.id','archive.Arc_Fid')
            ->join('company','company.id','archive.Com_Fid')
            ->select('archive.Project_Code','archive.Year','archive.Pages','archive_location.name','company.Name','archive.Project_File')
            ->where('Year','like',$request->code.'%')->get();
        return response()->json($data);
    }



    public  function  Get_Project_Arc_Fid(Request $request)
    {


        $data=DB::table('archive')->join('archive_location','archive_location.id','archive.Arc_Fid')
            ->join('company','company.id','archive.Com_Fid')
            ->select('archive.Project_Code','archive.Year','archive.Pages','archive_location.name','company.Name','archive.Project_File')
            ->where('Arc_Fid','=',$request->code)
            ->where('Is_Active','=',1)
            ->get();
        return response()->json($data);
    }


    public  function  store(Request $request)
    {

        if($request->hasFile('Project_File')){

            $Project_File=$request->file('Project_File');

            $Requst_Image = $Project_File->getClientOriginalName();
            $Extension = $Project_File->getClientOriginalExtension();

            $ProjectFile=  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Project_File->storeAs('public/Archive', $ProjectFile);

        }
        else
        {
            $ProjectFile='';
        }

$Archive= new Archive();

$Archive->Project_Code =$request->Project_Code ;
$Archive->Project_Name =$request->Project_Name ;
$Archive->Year         =$request->Year         ;
        $Archive->End_year         =$request->End_year         ;
        $Archive->Com_Fid         =$request->Com_Fid         ;
        $Archive->Project_File         =$ProjectFile        ;
$Archive->Arc_Fid      =$request->Arc_Fid      ;

$Archive->Is_Active    =1    ;

        $Archive->Add_id    =Auth::user()->id    ;
        $Archive->save();
        if($Archive->save())
        {

            return redirect()->action('ArciveController@List_Archive')->with('msg','این پروژه درسیستم ارشیف ثپت شد');
        }

    }

    public  function  List_Archive()
    {

$data=Archive::where('Is_Active',1)->get();

        return view('Archive.List',compact('data'));


    }
    public  function  Edit($id)
    {

        $data=Archive::where('id',$id)->first();

        $Location=Archive_location::all();
        $company=Company::all();
        return view('Archive.Edit',compact('data','Location','company'));
    }


    public  function  view_Archive($id)
    {
        $data=Archive::where('id',$id)->first();

        $Location=Archive_location::all();
        $company=Company::all();
        return view('Archive.view',compact('data','Location','company'));
    }



    public  function  Update(Request $request)
    {

        if($request->hasFile('Project_File')){

            $Project_File=$request->file('Project_File');

            $Requst_Image = $Project_File->getClientOriginalName();
            $Extension = $Project_File->getClientOriginalExtension();

            $ProjectFile=  $Requst_Image.date('mdYHis') . uniqid().'.'.$Extension;
            $Project_File->storeAs('public/Archive', $ProjectFile);

        }
        else
        {
            $ProjectFile=$request->ProjectFile;
        }

        $Archive= Archive::find($request->id);

        $Archive->Project_Code =$request->Project_Code ;
        $Archive->Project_Name =$request->Project_Name ;
        $Archive->Year         =$request->Year         ;
        $Archive->Arc_Fid      =$request->Arc_Fid      ;
        $Archive->End_year         =$request->End_year         ;
        $Archive->Com_Fid         =$request->Com_Fid         ;
        $Archive->Project_File         =$ProjectFile        ;
        $Archive->Is_Active    =1    ;

        $Archive->Add_id    =Auth::user()->id    ;
        $Archive->save();
        if($Archive->save())
        {

            return redirect()->action('ArchiveController@List_Archive')->with('msg','این پروژه درسیستم ارشیف تغیر شد');
        }
    }
}
