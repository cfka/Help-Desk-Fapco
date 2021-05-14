<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloDepartment;
use Illuminate\Http\Request;
use Helpdesk\modeloCeco;
use Helpdesk\Http\Requests\rqst_departments;
use Helpdesk\Http\Requests\rqst_departments_edit;

use Redirect;
use Session;
use DB;

class departmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments= modeloDepartment::all();
        $cecos= modeloCeco::all();
        return view('admin.gestion.departamentos.tableDepartment', compact('departments','cecos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $cecos=modeloCeco::all();
       return view('admin.gestion.departamentos.formDepartment',compact('cecos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rqst_departments $request)
    {
        $department= new modeloDepartment($request ->all());
        $department->name = mb_strtoupper($request->name, 'UTF-8');
        $department->description = mb_strtoupper($request->description, 'UTF-8');
        $department->ceco_id =$request->ceco_id;
        $department->save();
        $ultimo= modeloDepartment::all();
        $ulti= $ultimo->last()->id;
        Session::flash('message','Nuevo departamento fue creado exitosamente');
        return response()->redirectToAction('departmentsController@edit', $ulti);

    }

    public function retornar(){
        return Redirect::to('/department');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department=modeloDepartment::findorfail($id);
        $ceco=modeloCeco::findorfail($department->ceco_id);
        return view('admin.gestion.departamentos.profile_department', compact('department','ceco'));
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
        $cecos=modeloCeco::all();
        $department = modeloDepartment::findOrFail($id);
        return view('admin.gestion.departamentos.departmentEdit',compact('department','cecos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(rqst_departments_edit $request, $id)
    {
        //
        $department = modeloDepartment::findOrFail($id);
        $department->name = mb_strtoupper($request->name, 'UTF-8');
        $department->description = mb_strtoupper($request->description, 'UTF-8');
        $department->ceco_id =$request->ceco_id;

        $department->save();
        Session::flash('message','Departamento actualizado exitosamente');
        return response()->redirectToAction('departmentsController@edit', $id);

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
        $department= modeloDepartment::findOrFail($id);
        try {
            $department->delete();
        } catch (\Throwable $th) {
            Session::flash('error','El Departamento no puede ser eliminado porque tiene usuarios o activos asociados');
            return Redirect::to('/department');
        }
        Session::flash('message','El Departamento se ha Eliminado Exitosamente');
        return Redirect::to('/department');
    }
}
