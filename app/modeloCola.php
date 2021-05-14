<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class modeloCola extends Model

{
    // use SoftDeletes;
    //
    protected $table = 'cola';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id_user',
        'id_tec',
        'tec_report',
        'user_report',
        'id_asset',
        'created',
        'attended',
        'priority',
        'state'

    ] ;
    // protected $dates = ['deleted_at'];
    public $timestamps = false;

}
