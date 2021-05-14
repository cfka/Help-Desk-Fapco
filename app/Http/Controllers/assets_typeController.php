<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloAsset_type;
use Illuminate\Http\Request;
use Helpdesk\Http\Requests\rqst_asset_type_create;
use Helpdesk\Http\Requests\rqst_asset_type_edit;

use Redirect;
use Session;
use DB;

class assets_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types= modeloAsset_type::all();
        return view('admin.inventario.tipoActivo.tablesTipoActivo',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.inventario.tipoActivo.formTipoActivo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rqst_asset_type_create $request)
    {
        //
        $type= new modeloAsset_type($request->all());
        $type->type= mb_strtoupper($request->type, 'UTF-8');
        $type->save();
        $ultimo= modeloBrand::all();
        $ulti= $ultimo->last()->id;
        Session::flash('message','Tipo de equipo Creado Exitosamente');
        return response()->redirectToAction('assets_typeController@edit', $ulti);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        if ($id==2 or $id==9) {
            Session::flash('error','Tipo de activo IMPRESORA O FOTOCOPIADORA NO PUEDE SER MODIFICADO');
            return Redirect::to('/assetsType');
        }
        $type = modeloAsset_type::findOrFail($id);
        return view('admin.inventario.tipoActivo.tipoActivoEdit',['type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(rqst_asset_type_edit $request, $id)
    {
        //
        $type = modeloAsset_type::findOrFail($id);
        $type->type= mb_strtoupper($request->type, 'UTF-8');
        $type->save();

        Session::flash('message','Tipo De Equipo Actualizado Exitosamente');
        return response()->redirectToAction('assets_typeController@edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type= modeloAsset_type::findOrFail($id);
        if ($id==2 or $id==9) {
            Session::flash('error','Tipo de activo IMPRESORA O FOTOCOPIADORA NO PUEDE SER ELIMINADO');
            return Redirect::to('/assetsType');
        }
        try {
            $type->delete();
        } catch (\Throwable $th) {
            Session::flash('error','Tipo de activo no puede ser eliminado porque esta asociada a un activo');
            return Redirect::to('/assetsType');
        }
        Session::flash('message','El Tipo de activo se ha Eliminado Exitosamente');
        return Redirect::to('/assetsType');
    }
}
