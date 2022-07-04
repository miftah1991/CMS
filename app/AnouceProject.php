<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Contracts\Auditable;
class AnouceProject extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   protected  $table="anouce_project";



   public  function anounceprojectmemberlist()
   {


       return $this->hasMany('App\AounceProjectMemberList','id');

   }
    public  function  registerproject()
    {
        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');

    }

    public  function  offercompany()
    {
        return $this->hasOne('App\OfferCompany','id');

    }
    public  function  companycontact()
    {
        return $this->hasOne('App\CompanyContact','id');

    }
}
