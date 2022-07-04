<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Founder extends Model implements AuditableContract
{
   protected  $table="founder";
    use \OwenIt\Auditing\Auditable;

    public  function  registerprocurement()
    {

        //   return $this->hasMany('App\District','Dis_Fid');
        return $this->hasMany('App\RegisterProcurement','id');

    }
}
