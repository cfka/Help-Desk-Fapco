<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloSoftware;
use Illuminate\Http\Request;
use Helpdesk\Http\Requests\rqst_software;
use Helpdesk\Http\Requests\rqst_software_edit;
use Redirect;
use Session;
use DB;

class softwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $softwares= modeloSoftware::all();
        return view('admin.inventario.software.tablesoftware',compact('softwares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.inventario.software.formSoftware');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rqst_software $request)
    {
        //
        $software= new modeloSoftware($request ->all());
        $software->name= mb_strtoupper($request->name, 'UTF-8');
        $software->save();
        $soft= modeloSoftware::all();
        $so= $soft->last()->id;
       
        Session::flash('message','Software se ha Creado Exitosamente');
        return response()->redirectToAction('softwareController@edit', $so);
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
        $software = modeloSoftware::findOrFail($id);

        return view('admin.inventario.software.softwareEdit',['software'=>$software]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(rqst_software_edit $request, $id)
    {
       
        //
        $software = modeloSoftware::findOrFail($id);
        $software->fill($request->all());
        $software->name= mb_strtoupper($request->name, 'UTF-8');
        $software->save();

        Session::flash('message','Software Actualizado Exitosamente');
        return response()->redirectToAction('softwareController@edit', $id);

     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $software= modeloSoftware::findOrFail($id);
        try {
            $software->delete();
        } catch (\Throwable $th) {
            Session::flash('error','Software no puede ser eliminado porque esta asociada a un activo o consumible');
            return Redirect::to('/software');
        }
        Session::flash('message','El Software se ha Eliminado Exitosamente');
        return Redirect::to('/software');
    }
}
