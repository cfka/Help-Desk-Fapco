<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloCompany extends Model
{
    //
    protected $table = 'companies';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'description',
        'name' ] ;

    public $timestamps = false;
}
