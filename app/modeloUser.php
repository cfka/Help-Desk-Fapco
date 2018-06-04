<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class modeloUser extends Model
{
   protected $table = 'users';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'document',
        'first_name',
        'last_name',
        'email',
        'position',
        'type',
        'department_id',
        'avatar',
        'password'
    ];

     public $timestamps = false;
}
