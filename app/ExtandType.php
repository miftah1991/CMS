<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class ExtandType extends Model implements AuditableContract
{
 protected  $table="extendtype";
    use \OwenIt\Auditing\Auditable;
 public  function  extandproject()
 {


     return $this->hasMany('ExtandProject','id');
 }


}
