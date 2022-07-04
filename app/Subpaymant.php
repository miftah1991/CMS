<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Subpaymant extends Model  implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
   protected  $table="subpaymant";

   public  function  paymant()
   {
       return $this->belongsTo('App\Paymant','Pay_Fid');

   }
}
