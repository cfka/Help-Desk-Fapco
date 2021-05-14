<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;



class modeloUser extends Model implements AuthenticatableContract,AuthorizableContract, CanResetPasswordContract
{
   use Authenticatable, Authorizable, CanResetPassword;
   protected $table = 'users';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'document',
        'first_name',
        'last_name',
        'email',
        'position',
        'type',
        'company_id',
        'password',
        'remember_token',
        'gender',
        'is_active',
        'priority'
    ];

    protected $hidden = ['password', 'remember_token'];
    // protected $dates = ['deleted_at'];
    public $timestamps = false;

    public static function user($id){
        return modeloUser::where('department_id','=',$id)
            ->get();
    }

    public static function userName($id){
        return modeloUser::where('id','=',$id)
        ->get();
    }
}


