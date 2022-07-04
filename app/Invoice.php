<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Invoice extends Model  implements  AuditableContract
{
   protected  $table="invoice";
    use \OwenIt\Auditing\Auditable;

    public  function  registerprocurement()
    {


        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');
    }
    public  function  invoicetype()
    {


        return $this->belongsTo('App\Invoicetype','Inv_Fid');
    }


}
