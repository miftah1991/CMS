<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceptproject extends Model
{
  protected $table="acceptproject";

    public  function  registerprocurement()
    {


        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');
    }
    public  function  statustype()
    {


        return $this->belongsTo('App\Statustype','Stat_Fid');
    }

}
