<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloDepartment extends Model
{
    //
    protected $table = 'departments';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description',
        'ceco_id'
     ] ;

    public $timestamps = false;
}
