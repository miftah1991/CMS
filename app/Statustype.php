<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Statustype extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
protected $table="statustype";
    public  function  rejecttype()
    {
        return $this->hasMany('App\RejectType','id');

    }
    public  function  acceptproject()
    {
        return $this->hasMany('App\Acceptproject','id');

    }

}
