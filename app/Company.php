<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Company extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
  protected $table="company";

  public  function  archive()

  {
      return $this->hasMany('App\Archive','id');
  }
}
