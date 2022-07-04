<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class RejectProject extends Model implements AuditableContract
{

    protected $table="rejectproject";
    use \OwenIt\Auditing\Auditable;
    public  function  registerprocurement()
    {


        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');
    }
    public  function  statustype()
    {


        return $this->belongsTo('App\Statustype','Stat_Fid');
    }

}
