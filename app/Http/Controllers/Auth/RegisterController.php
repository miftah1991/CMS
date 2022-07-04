<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{



    public function __contruct()
    {
        $this->middleware('auth');
    }



    public  function  index()
    {


        $data=role::all();


        return view('User.index',compact('data'));






    }



    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */



    public function active($id)
    {

            $user = User::findOrFail($id);
            $user->active=1;
            $user->save();
            return redirect()->back()->with('msg', 'کاربر موفقانه فعال شد.');

        //
    }


    public function nactive($id)
    {

            $user = User::findOrFail($id);
            $user->active=0;
            $user->save();
            return redirect()->back()->with('msg','کاربر موفقانه  غیر فعال شد.');
        }







public  function  Edit($id)
{

    $data=User::find($id)->first();
    $role=role::all();

    return view('User.Edit',compact('data','role'));

}

public  function  Update(Request $request)
{

    $User= User::find($request->id);
    $User->name=$request->name;
    $User->email=$request->email;
    $User->role_id=$request->role_id;
    $User->password=bcrypt($request->password);
    $User->save();
    if($User->save())
    {
        return back()->with('msg','کارمند نو ثپت شد');
    }

}




    protected function store(Request $request)
    {

        $User= new User();
        $User->name=$request->name;
        $User->email=$request->email;
        $User->role_id=$request->role_id;
        $User->password=bcrypt($request->password);
        $User->save();
        if($User->save())
        {
            return back()->with('msg','کارمند نو ثپت شد');
        }


    }


    public  function  List()
    {
$data=User::all();

return view('User.List',compact('data'));

    }
}
