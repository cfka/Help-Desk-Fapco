<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class modeloSoftware extends Model
{
    // use SoftDeletes;
    //
    protected $table = 'software';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'

    ] ;
    // protected $dates = ['deleted_at'];
    public $timestamps = false;
}
