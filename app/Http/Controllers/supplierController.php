<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloSupplier;
use Illuminate\Http\Request;
use Helpdesk\Http\Requests\rqst_supplier;
use Helpdesk\Http\Requests\rqst_supplier_edit;


use Session;
use Redirect;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers= modeloSupplier::all();
        return view('admin.gestion.proveedores.tableSupplier',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gestion.proveedores.formSupplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rqst_supplier $request)
    {
        $supplier= new modeloSupplier($request->all());
        $supplier->name= mb_strtoupper($request->name, 'UTF-8');
        $supplier->rif= mb_strtoupper($request->rif, 'UTF-8');
        $supplier->description= mb_strtoupper($request->description, 'UTF-8');
        $supplier->contac_phone= mb_strtoupper($request->contac_phone, 'UTF-8');
        $supplier->email= mb_strtoupper($request->email, 'UTF-8');
        $supplier->save();
        $ultimo= modeloSupplier::all();
        $ulti= $ultimo->last()->id;
        Session::flash('message','Nuevo Proveedor creado exitosamente');
        return response()->redirectToAction('supplierController@edit', $ulti);


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier=modeloSupplier::FindOrFail($id);
        return view('admin.gestion.proveedores.profile_supplier', compact('supplier'));
    }

    public function retornar(){
        return Redirect::to('/supplier');
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
        $supplier= modeloSupplier::findOrFail($id);

        return view('admin.gestion.proveedores.editSupplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(rqst_supplier_edit $request, $id)
    {
        //
        $supplier= modeloSupplier::findOrFail($id);
        $supplier->rif = mb_strtoupper($request->rif, 'UTF-8');
        $supplier->name = mb_strtoupper($request->name, 'UTF-8');
        $supplier->description = mb_strtoupper($request->description, 'UTF-8');
        $supplier->email = mb_strtoupper($request->email, 'UTF-8');
        $supplier->contac_phone = mb_strtoupper($request->contac_phone, 'UTF-8');

        //$supplier->fill($request->all());
        $supplier->save();
        Session::flash('message','Proveedores editado de forma exitosa');
        return response()->redirectToAction('supplierController@edit', $id);

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
        $supplier= modeloSupplier::findorFail($id);
        try {
            $supplier->delete();
        } catch (\Throwable $th) {
            Session::flash('error','Proveedor no puede ser eliminado porque esta asociado a un activo o a un servicio');
            return Redirect::to('/supplier');
        }
        
        Session::flash('message','Proveedor eliminado de forma exitosa');
        return Redirect::to('/supplier');
    }
}
