<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloCompany;
use Illuminate\Http\Request;
use Helpdesk\modeloCeco;
use Helpdesk\Http\Requests\rqst_cecos;
use Helpdesk\Http\Requests\rqst_cecos_edit;
use Redirect;
use Session;
use DB;

class cecosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cecos= modeloCeco::all();
        $companies= modeloCompany::all();
        return view('admin.gestion.cecos.tableCecos',compact('cecos','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=modeloCompany::all();
        return view('admin.gestion.cecos.formCecos', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rqst_cecos $request)
    {
        //
        $ceco= new modeloCeco($request->all());
        $ceco->number=mb_strtoupper($request->number, 'UTF-8');
        $ceco->company_id=$request->company_id;
        $ceco->manager=mb_strtoupper($request->manager, 'UTF-8');
        $ceco->save();
        $ultimo= modeloCeco::all();
        $ulti= $ultimo->last()->id;
        Session::flash('message','Nuevo centro de costos creado exitosamente');
        return response()->redirectToAction('cecosController@edit', $ulti);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ceco= modeloCeco::findorfail($id);
        $company= modeloCompany::findorfail($ceco->company_id);
        return view('admin.gestion.cecos.profile_ceco',compact('ceco','company'));
    }
    public function retornar(){
        return Redirect::to('/cecos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies=modeloCompany::all();
        $ceco= modeloCeco::findOrFail($id);
        return view('admin.gestion.cecos.editCecos',compact('ceco','companies'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(rqst_cecos_edit $request, $id)
    {
        $ceco= modeloCeco::findOrFail($id);
        $ceco->number=mb_strtoupper($request->number, 'UTF-8');
        $ceco->company_id=$request->company_id;
        $ceco->manager=mb_strtoupper($request->manager, 'UTF-8');
        $ceco->save();
        Session::flash('message','Centro de Costos editado de forma exitosa');
        return response()->redirectToAction('cecosController@edit', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ceco= modeloCeco::findOrFail($id);
        try {
            $ceco->delete();
        } catch (\Throwable $th) {
            Session::flash('error','CECO no puede ser eliminado porque esta asociada a un departamento o a un activo');
            return Redirect::to('/cecos');
        }
        Session::flash('message','El ceco se ha Eliminado Exitosamente');
        return Redirect::to('/cecos');
    }
}

