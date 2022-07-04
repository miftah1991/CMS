<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function PHPSTORM_META\elementType;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
class AounceProjectMemberList extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    protected  $table="team_member_contract";


    public  function  aounceproject()
    {
        return $this->belongsTo('App\AnouceProject','Ano_Fid');

    }


    public  function  contract()
    {

        return $this->belongsTo('App\Contract','Con_Fid');

    }



}
