<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Archive_location extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    protected $table="archive_location";
    public  function  archive()
    {
        return $this->hasMany('App\Archive','id');

    }
}

