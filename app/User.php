<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected  $connection="mysql_ums";
    protected  $table="users";
    public  function  company()
    {
        return $this->belongsTo('App\Company','CO_Fid');
    }


    public  function  user_role()
    {
        return $this->hasOne('App\user_role','id');

    }
    protected $fillable = [
        'name', 'email', 'password','company_id', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   

}
