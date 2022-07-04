<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    protected  $table="user_roles";
    public  $connection="mysql_ums";
    public  function  role()
    {
        return $this->belongsTo('App\role','role_id');
    }
    public  function  user()
    {
        return $this->belongsTo('App\User','user_id');
    }



}
