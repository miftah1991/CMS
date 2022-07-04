<?php

namespace App\Http\Controllers;

use App\User;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\user_role;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function log()
    {
        return view('log');
    }

    public function login(Request $request)
    {
        try
        {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password]) && Auth::user()->active == 1) {


                if(Auth::user()->CMS_Fid==1 or Auth::user()->All_Fid==1) {
                    $role=user_role::where('user_id',Auth::user()->id)->where('sys_id',2)->first();




                    if($role)
                    {
                        Session::put('role_id', $role->role_id);
                        return redirect('home');
                    }
                    else
                    {
                        return back();
                    }

                }
            }
            else {
                //if the email and password was incorrect
                dd('Pleas check your email and password!');
                return back();
            }


        }
        catch (Exception $x)
        {}


    }

    public function logout(){
        Auth::logout();
         \Session::flash('success',"");
     return redirect()->to('http://pmis.dabs.af');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
