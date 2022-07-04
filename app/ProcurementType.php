<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class ProcurementType extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
   protected  $table="procurmenttype";


    public  function  registerprocurement()
    {

        //   return $this->hasMany('App\District','Dis_Fid');
        return $this->hasMany('App\RegisterProcurement','id');

    }
}
