<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class OfferCompany extends Model implements AuditableContract
{
  protected  $table="offercompany";
    use \OwenIt\Auditing\Auditable;

  public  function  registerprocuremnet()
  {
      return $this->belongsTo('App\RegisterProcurement','Pro_Fid');


  }
    public  function  anouceproject()
    {
        return $this->belongsTo('App\AnouceProject','Ano_Fid');


    }
}
