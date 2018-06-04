<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloSupplier extends Model
{
    //
    protected $table = 'suppliers';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'rif',
        'name',
        'description',
        'contac_phone',
        'email'
     ] ;

    public $timestamps = false;
}
