<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class ExtandProject extends Model implements AuditableContract
{
  protected $table="extendproject";
    use \OwenIt\Auditing\Auditable;
    public  function  registerprocurement()
    {


        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');
    }

    public  function  extandtype()
    {


        return $this->belongsTo('App\ExtandType','Ext_Fid');
    }
}
