<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Email extends Model implements AuditableContract
{
    protected $table="email";
    use \OwenIt\Auditing\Auditable;
    public  function  registerprocurement()
    {

        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');
    }
}
