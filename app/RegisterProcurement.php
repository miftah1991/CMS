<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class RegisterProcurement extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
protected  $table="registerprocurement";


public  function  district()
{


    return $this->belongsTo('App\District','Dis_Fid');


}

    public  function  procurementtype()
    {


        return $this->belongsTo('App\ProcurementType','Pro_Type_Fid');


    }



    public  function  contractreport()
    {


        return $this->belongsTo('App\ContractReport','id');


    }






    public  function  founder()
    {


        return $this->belongsTo('App\Founder','Fou_Fid');


    }

    public  function  anouceproject()
    {
      return  $this->hasOne('App\AnouceProject','id');

    }

    public  function  offercompany()
    {
        return  $this->hasOne('App\OfferCompany','id');

    }



   public  function  evaluation()
   {

       return $this->hasOne('App\Evaluation','id');
   }
public  function  award()
{

    return $this->hasOne('App\Award','id');
}
public  function  complain()
{
    return $this->hasOne('App\Complain','id');

}
    public  function  contract()
    {
        return $this->hasOne('App\Contract','id');

    }

    public  function  rejectproject()
    {
        return $this->hasOne('App\RejectProject','id');

    }
    public  function  acceptproject()
    {
        return $this->hasOne('App\Acceptproject','id');

    }


    public  function  paymant()
    {
        return $this->hasMany('App\Paymant','id');

    }

    public  function  ConditionOffer()
    {
        return $this->hasMany('App\ConditionOffer','id');
    }



    public  function  email()
    {
        return $this->hasMany('App\Email','id');

    }
    public  function  crime()
    {
        return $this->hasMany('App\Crime','id');

    }
    public  function  invoice()
    {
        return $this->hasMany('App\Invoice','id');

    }

    public  function  ExandDetails()
    {
        return $this->hasMany('App\ExandDetails','id');

    }


    public  function  ExtandProjectReprot()
    {
        return $this->hasMany('App\ExtandProjectReprot','id');

    }


    public  function  workpersantage()
    {
        return $this->hasMany('App\Workpersantage','id');

    }


    public  function  extendproject()
    {
        return $this->hasMany('App\ExtandProject','id');

    }



    public  function  completeproject()
    {
        return $this->hasMany('App\CompleteProject','id');

    }

}
