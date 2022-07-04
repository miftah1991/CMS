<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ExandDetails extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
   protected  $table="extend_details";
    public  function  registerprocurement()
    {


        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');
    }

}
