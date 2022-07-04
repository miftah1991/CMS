<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Archive extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
   protected $table="archive";
    public  function  archive_location()
    {
        return $this->belongsTo('App\Archive_location','Arc_Fid');

    }
    public  function  company()
    {
        return $this->belongsTo('App\Company','Com_Fid');
    }
}
