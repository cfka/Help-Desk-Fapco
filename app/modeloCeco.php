<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class modeloCeco extends Model
{
    //
    // use SoftDeletes;

    protected $table = 'cecos';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'number',
        'company_id',
        'manager'
        ] ;
    // protected $dates = ['deleted_at'];
    public $timestamps = false;


    public static function cecobycompany($id){
        return modeloCeco::where('company_id','=',$id)
            ->get();
    }

}
