<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class CompanyContact extends Model implements AuditableContract
{
    protected $table="offercompanycontact";
    use \OwenIt\Auditing\Auditable;

public  function  anouceproject()
{

    return $this->belongsTo('App\AnouceProject','Ano_Fid');
}


public  function  award()
{

    return $this->belongsTo('App\Award','Awar_Fid');

}


}
