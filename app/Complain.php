<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Complain extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
  protected  $table="complain";

    public  function  registerprocurement()
    {


        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');
    }

    public  function  companycontact()
    {
        return $this->hasOne('App\CompanyContact','Com_Fid');

    }

}
