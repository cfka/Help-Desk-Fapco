<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloAsset_type;
use Helpdesk\modeloBrand;
use Helpdesk\modeloCeco;
use Helpdesk\modeloCompany;
use Helpdesk\modeloPlanning;
use Helpdesk\modeloticket;
use Illuminate\Http\Request;
use Helpdesk\modeloAsset;
use Helpdesk\modeloFailure;
use Helpdesk\modeloUser;
use Helpdesk\modeloSource;
use Illuminate\Support\Facades\Auth;

use Redirect;
use Session;
use DB;

class planningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans=modeloPlanning::All();
        $assets = modeloAsset::All();
        $users = modeloUser::All();
        $sources = modeloSource::All();
        $failures = modeloFailure::All();
        $companies=modeloCompany::all();
        $cecos=modeloCeco::All();
        return view('admin.soporte.planificacion.tableplanning', compact('tickets','assets','users','sources','failures','cecos','plans','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tickets=modeloticket::All();
        $assets = modeloAsset::All();
        $users = modeloUser::All();
        $sources = modeloSource::All();
        $failures = modeloFailure::All();
        $cecos=modeloCeco::All();
        $companies=modeloCompany::All();
        return view('admin.soporte.planificacion.formPlanning', compact('tickets','assets','users','sources','failures','cecos','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planning = new modeloPlanning($request->all());
        $planning->admin_id= Auth::user()->id;
        $planning->planning_at = now();
        $planning->planned_at=$request->planned_at;
        if ($planning->type=== "") {
            Session::flash('warning','Elija el tipo de planificación por favor');
            return back();
        }else{
            $assets = DB::select("SELECT * from assets where company_id='$request->company_id' and is_active =1 ");
        }

        if(empty($assets)){
            Session::flash('warning','La compañia no posee equipos asignados');
            return back();
        }
        $planning->save();
        $planning_ult= modeloPlanning::all();
        $planning_id= $planning_ult->last()->id;
        //dd($request);
        foreach ($assets as $asset){
            DB::table('planning_assets')->insert([
                ['asset_id' => $asset->id, 'planning_id' => $planning_id],
            ]);
        }
        Session::flash('message','El Activo se ha Creado Exitosamente');
        return Redirect::to('/planning');
    }

    public function getasset(Request $request, $id){
        if($request->json()){
            $assets = modeloAsset::assets_company($id);
            return response()->json($assets);
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan=modeloPlanning::findorfail($id);
        $company=modeloCompany::findorfail($plan->company_id) ;
        $admin=modeloUser::findorfail($plan->admin_id);
        $brands=modeloBrand::all();
        $users=modeloUser::all();
        $assets_types=modeloAsset_type::all();
        $assets=DB::select(" SELECT * from assets LEFT JOIN  planning_assets on assets.id= planning_assets.asset_id where planning_id='$plan->id' and deleted_at is NULL ");
       // dd($assets);
        return view('admin.soporte.planificacion.profile_planning',compact('plan','company','admin','assets','assets_types','brands','users'));
    }

    public function retornar(){
        return Redirect::to('/planning');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planning=modeloPlanning::findorfail($id);
        $company=modeloCompany::findorfail($planning->company_id) ;
        $admin=modeloUser::findorfail($planning->admin_id);
        $brands=modeloBrand::all();
        $users=modeloUser::all();
        $assets_types=modeloAsset_type::all();
        $assets=DB::select(" SELECT * from assets LEFT JOIN  planning_assets on assets.id= planning_assets.asset_id where planning_id='$planning->id'and deleted_at is NULL ");
        // dd($assets);
        return view('admin.soporte.planificacion.planning_edit',compact('planning','company','admin','assets','assets_types','brands','users'));
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
