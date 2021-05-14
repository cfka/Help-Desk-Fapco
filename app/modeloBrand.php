<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class modeloBrand extends Model
{
    // use SoftDeletes;
    //
    protected $table = 'brands';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'

    ] ;
    // protected $dates = ['deleted_at'];
    public $timestamps = false;
}
