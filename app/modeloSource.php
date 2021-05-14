<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloSource extends Model
{
    protected $table = 'sources';
    protected $primaryKey = 'id';

    protected $fillable =
        [
        'name',
        'description'
         ] ;

    public $timestamps = false;
}
