<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\RegisterProcurement;
use App\AounceProjectMemberList;

class ApiController extends Controller
{
    public  function  Get_Emial()
    {
        $data=AounceProjectMemberList::all();

        return $data;

    }

    public function login(Request $request)
    {

        dd($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' =>$request->password]) ) {

            return redirect()->action('AdminController@home');
        }
        else{
            //if the email and password was incorrect
            dd('Pleas check your email and password!');
            return back();
        }


    }



    public  function  insert_email_code($code,$name)
{
$email= new Email();
$email->code=$code;
$email->Send_Name=$name;
$email->save();

return "ایمل شما ثپت شد ";

}


}
