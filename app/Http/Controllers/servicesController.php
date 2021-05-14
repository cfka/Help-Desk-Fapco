<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloCeco;
use Helpdesk\modeloService;
use Illuminate\Http\Request;
use Redirect;
use Session;

class servicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services= modeloService::all();
        return view('admin.gestion.servicios.tableservices', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gestion.servicios.formServices');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $service= new modeloService($request->all());
        $service->save();
        Session::flash('message','Nuevo Servicio creado exitosamente');
        return Redirect::to('/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service= modeloService::findorfail($id);
        $ceco=modeloCeco::findorfail($service->ceco_id);
        return view('admin.gestion.servicios.profile_services', compact('service','ceco'));
    }

    public function retornar(){
        return Redirect::to('/services');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = modeloService::findOrFail($id);
        return view('admin.gestion.servicios.editServices',['service'=>$service]);
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
       $service= modeloService::findOrFail($id);
       $service->fill($request->all());
       $service->save();
       Session::flash('message','Servicio editado de forma exitosa');
       return Redirect::to('/services');
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
        $service= modeloService::findOrFail($id);
        $service->delete();
        Session::flash('message','El servicio se ha Eliminado Exitosamente');
        return Redirect::to('/services');
    }
}
