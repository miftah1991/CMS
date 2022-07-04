<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class EvaluationReport extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;

   protected $table="evaluationreport";

    public  function  registerprocuremnet()
    {
        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');


    }
}
