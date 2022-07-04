<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Workpersantage extends Model implements AuditableContract
{
   protected $table="workpersantage";
    use \OwenIt\Auditing\Auditable;

   public  function  registerproject()
   {


       return $this->belongsTo('App\RegisterProcurement','Pro_Fid');
   }
}
