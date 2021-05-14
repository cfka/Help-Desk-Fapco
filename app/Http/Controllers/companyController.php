<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloCeco;
use Illuminate\Http\Request;
use Helpdesk\Http\Requests\rqst_company;
use Helpdesk\Http\Requests\rqst_company_edit;
use Helpdesk\modeloCompany;
use Redirect;
use Session;
use DB;

class companyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies= modeloCompany::all();
        return view('admin.gestion.empresa.tableCompany',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cecos=modeloCeco::all();
        return view('admin.gestion.empresa.formCompany',compact('cecos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rqst_company $request)
    {
        $company= new modeloCompany($request ->all());
        $company->description= mb_strtoupper($request->description, 'UTF-8');
        $company->name= mb_strtoupper($request->name, 'UTF-8');
        $company->save();
        $ultimo= modeloCompany::all();
        $ulti= $ultimo->last()->id;
        Session::flash('message','La compañia se ha Creado Exitosamente');
        return response()->redirectToAction('companyController@edit', $ulti);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company= modeloCompany::findorfail($id);
        return view('admin.gestion.empresa.profile_company',compact('company'));
    }

    public function retornar(){
        return Redirect::to('/company');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = modeloCompany::findOrFail($id);
        $cecos=modeloCeco::all();
        return view('admin.gestion.empresa.companyEdit',['company'=>$company],compact('cecos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(rqst_company_edit $request, $id)
    {
        //
        $company = modeloCompany::findOrFail($id);
        $company->description= mb_strtoupper($request->description, 'UTF-8');
        $company->name= mb_strtoupper($request->name, 'UTF-8');
        $company->save();

        Session::flash('message','Compañía Actualizado Exitosamente');
        return response()->redirectToAction('companyController@edit', $id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company= modeloCompany::findOrFail($id);
        try {
            $company->delete();
        } catch (\Throwable $th) {
            Session::flash('error','Compañia no puede ser eliminada porque esta asociada a un ceco o a un activo');
            return Redirect::to('/company');
        }
        Session::flash('message','La Compañía se ha Eliminado Exitosamente');
        return Redirect::to('/company');
    }
}
