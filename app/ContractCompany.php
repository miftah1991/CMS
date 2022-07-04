<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class ContractCompany extends Model implements AuditableContract
{
   protected  $table="contractcompany";
    use \OwenIt\Auditing\Auditable;
    public  function  contract()
    {

        return $this->belongsTo('App\Contract','Con_Fid');

    }
}




