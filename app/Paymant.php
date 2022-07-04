<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Paymant extends Model implements AuditableContract
{
  protected  $table='paymant';
    use \OwenIt\Auditing\Auditable;
    public  function  registerprocurement()
    {

        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');
    }
    public  function  subpaymant()
    {
        return $this->hasMany('App\Subpaymant','id');
    }
}
