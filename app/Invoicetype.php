<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Invoicetype extends Model implements  AuditableContract
{
  protected  $table="invoicetype";
    use \OwenIt\Auditing\Auditable;
    public  function  invoice()
    {
        return $this->hasMany('App\Invoice','id');

    }
}
