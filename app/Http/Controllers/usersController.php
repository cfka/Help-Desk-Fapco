<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Helpdesk\modeloUser;
use Helpdesk\modeloDepartment;
use Helpdesk\Http\Requests\rqst_user_create;


use Session;
use Redirect;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = modeloUser::All();
        return view('admin.usuario.usuarios',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = modeloDepartment::all();
        // return $departments;
        return view('admin.usuario.form_usuarios', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rqst_user_create $request)
    {
        //
        //return $request;

       $User = new modeloUser($request->all());
       $User->password = bcrypt($request->password);
       $User->save();
       // modeloUser::create($request->all());

        Session::flash('message','El Usuario se ha Creado Exitosamente');
        return Redirect::to('/users');
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
    public function edit($id,rqst_user_create $request)
    {
            $users = modeloUser::find($id);
            return view('admin.usuario.form_usuarios',['users'=>$users]);
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
        $users = modeloUser::find($id);
        $users->fill($request->all());
        $users->save;

        Session::flash('message','El Usuario se ha Actualizado Exitosamente');
        return Redirect::to('/users');

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
        modeloUser::destroy($id);
        Session::flash('message','El Usuario se ha Eliminado Exitosamente');
        return Redirect::to('/users');

    }
}
