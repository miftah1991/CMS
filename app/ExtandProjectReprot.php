<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ExtandProjectReprot extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    protected  $table="extend_project_report";
    public  function  registerprocurement()
    {


        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');
    }
}
