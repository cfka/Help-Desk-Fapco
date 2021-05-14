<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloBrand;
use Helpdesk\modeloConsumables_type;
use Helpdesk\modeloPeripheral;
use Illuminate\Http\Request;

use Redirect;
use Session;
use DB;

class peripheralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peripherals= modeloPeripheral::all();
        return view('admin.inventario.activos.form_assets',compact('peripherals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands= modeloBrand::all();
        $consumable_types= modeloConsumables_type::all();
        return view('admin.inventario.perifericos.form_peripheral', compact('consumable_types','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peripheral = new modeloPeripheral($request->all());
        $peripheral->brands_id = mb_strtoupper($request->brands_id, 'UTF-8');
        $peripheral->model = mb_strtoupper($request->model, 'UTF-8');
        $peripheral->serial= mb_strtoupper($request->serial, 'UTF-8');
        $peripheral->operational= mb_strtoupper($request->operational, 'UTF-8');
        $peripheral->assigned= mb_strtoupper($request->assigned, 'UTF-8');
        $peripheral->save();
        Session::flash('message','Periferico Creado Exitosamente');
        return Redirect::to('/assets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peripheral=modeloPeripheral::findorfail($id);
        $brand= modeloBrand::findorfail($peripheral->name);
        $consumable_type= modeloConsumables_type::findorfail($peripheral->type);
        return view('admin.inventario.perifericos.profile_peripheral', compact('peripheral','brand','consumable_type'));

    }

    public function retornar(){
        return Redirect::to('/assets');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands= modeloBrand::all();
        $consumable_types= modeloConsumables_type::all();
        $peripheral = modeloPeripheral::findOrFail($id);
        return view('admin.inventario.perifericos.peripheral_edit',['peripheral'=>$peripheral],compact('brands','consumable_types'));
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
        $peripheral = modeloPeripheral::findOrFail($id);
        $peripheral->fill($request->all());
        $peripheral->save();

        Session::flash('message','Periférico Actualizado Exitosamente');
        return Redirect::to('/assets');
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
