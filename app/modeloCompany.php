<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class modeloCompany extends Model

{
    // use SoftDeletes;
    //
    protected $table = 'companies';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'description',
        'name',
        'ceco_id',

    ] ;
    // protected $dates = ['deleted_at'];
    public $timestamps = false;

    public static function company($id){
        return modeloCompany::where('id','=',$id)
            ->get();
    }

}
