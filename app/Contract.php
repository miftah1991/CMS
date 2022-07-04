<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class Contract extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    protected  $table="contract";


    public  function  registerprocurement()
    {

        return $this->belongsTo('App\RegisterProcurement','Pro_Fid');
    }

    public  function  contractcompany()
    {

        return $this->hasOne('App\ContractCompany','id');
    }

    public  function anounceprojectmemberlist()
    {


        return $this->hasMany('App\AounceProjectMemberList','id');

    }
}



