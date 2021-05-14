<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloBrand;
use Illuminate\Http\Request;
use Helpdesk\Http\Requests\rqst_brand;
use Helpdesk\Http\Requests\rqst_brand_edit;

use Redirect;
use Session;
use DB;
class brandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands=modeloBrand::all();
        return view('admin.inventario.marca.tablebrand',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.inventario.marca.formBrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rqst_brand $request)
    {
        //
        $brand= new modeloBrand($request ->all());
        $brand->name= mb_strtoupper($request->name, 'UTF-8');
        $brand->save();
        $ultimo= modeloBrand::all();
        $ulti= $ultimo->last()->id;
        Session::flash('message','Marca ha sido Creada Exitosamente');
        return response()->redirectToAction('brandController@edit', $ulti);


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
        $brand = modeloBrand::findOrFail($id);
        return view('admin.inventario.marca.brandEdit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(rqst_brand_edit $request, $id)
    {
        //
        $brand = modeloBrand::findOrFail($id);
        $brand->fill($request->all());
        $brand->name= mb_strtoupper($request->name, 'UTF-8');
        $brand->save();

        Session::flash('message','Marca Actualizado Exitosamente');
        return response()->redirectToAction('brandController@edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand= modeloBrand::findOrFail($id);
        try {
            $brand->delete();
        } catch (\Throwable $th) {
            Session::flash('error','Marca no puede ser eliminado porque esta asociada a un activo');
            return Redirect::to('/brand');
        }
        Session::flash('message','La Marca se ha Eliminado Exitosamente');
        return Redirect::to('/brand');
    }
}
