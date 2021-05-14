<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloSupport_companies extends Model
{
    protected $table = 'support_companies';
    protected $primarykey = 'id';

    protected $fillable = [
        'company_id' ,
        'admin_id'

    ] ;

    public $timestamps = false;

    public static function getcompaniestecn($id){
        return modeloSupport_companies::where('admin_id','=',$id)
            ->get();
    }
    public static function gettecn($id){
        return modeloSupport_companies::where('company_id','=',$id)
            ->get();
    }


}
