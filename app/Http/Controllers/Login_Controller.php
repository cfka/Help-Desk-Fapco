<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;
use Helpdesk\http\Requests;
use Helpdesk\Http\Requests\login_request;
use Helpdesk\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;

use Helpdesk\modeloUser;



class Login_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',['only'=>'showloginform']);
    }


    public function ShowLoginForm()
    {
        return view('login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(login_request $request)
    {
        //
        $email=mb_strtoupper($request['email'], 'UTF-8');
        if(Auth::attempt(['email' => $email, 'password'=> $request['password']])){

            return Redirect::to('/userhome');
        }
        else{
           // Session::flash('message-error', 'Datos Incorrectos');
          //  return Redirect::to('/');
            return back()
                ->withErrors(['email'=>'Datos Incorrectos'])
                ->withInput(request(['email']));
        }
    }

    public function logout(){

        Auth::logout();
        return Redirect::to('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
