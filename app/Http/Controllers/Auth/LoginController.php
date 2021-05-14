<?php

namespace Helpdesk\Http\Controllers\Auth;

use Helpdesk\Http\Controllers\Controller;

use Helpdesk\Http\Requests\login_request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{

    public function  login(login_request $request){


        if(Auth::attempt(['email' => $request['email'], 'password'=> $request['password']])){

            return Redirect::to('/admin');
        }
        else{
            Session::flash('message', 'Datos Incorrectos');
            return Redirect::to('/');
        }
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/');

    }


}
