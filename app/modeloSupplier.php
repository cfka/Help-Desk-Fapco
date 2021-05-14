<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class modeloSupplier extends Model
{
    //
    // use SoftDeletes;
    protected $table = 'suppliers';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'rif',
        'name',
        'description',
        'contac_phone',
        'email'
     ] ;
    // protected $dates = ['deleted_at'];
    public $timestamps = false;

}
