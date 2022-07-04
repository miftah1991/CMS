<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public  $connection="mysql_ums";
    protected $table='roles';
    public  function  user()
    {
        return $this->hasMany('App\User','id');

    }
    public  function  system()
    {
        return $this->belongsTo('App\System','SYS_Fid');

    }
    public  function  user_role()
    {
        return $this->hasMany('App\user_role','id');

    }






}
