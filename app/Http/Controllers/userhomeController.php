<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloAsset;
use Helpdesk\modeloCompany;
use Helpdesk\modeloFailure;
use Helpdesk\modeloPlanning;
use Helpdesk\modeloSupport_companies;
use Helpdesk\modeloticket;
use Helpdesk\modeloUser;



use Helpdesk\modeloAsset_history;
use Helpdesk\modeloAsset_type;
use Helpdesk\modeloBrand;
use Helpdesk\modeloCeco;
use Helpdesk\modeloConsumable;
use Helpdesk\modeloConsumables_type;
use Helpdesk\modeloDepartment;
use Helpdesk\modeloModel;
use Helpdesk\modeloPeripheral;
use Helpdesk\modeloSoftware;
use Helpdesk\modeloSupplier;
use Helpdesk\modeloAsset_peripheal;





use Illuminate\Http\Request;
use Helpdesk\Http\Controllers\usersController;
use Helpdesk\Http\Controllers\ticketsController;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use DB;

class userhomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tickets=modeloticket::all();
        // $plans=modeloPlanning::where('admin_id',Auth::user()->id)->get();
        // $supportcomp= modeloSupport_companies::all();
        // $companies=modeloCompany::all();
        // $assets=modeloAsset::all();
        // $users = modeloUser::all();
        // $failures= modeloFailure::all();
        // $userlo =Auth::user()->id;
        // if(Auth::user()->id !=='USER'){
        //     $status = DB::table('tickets')
        //         ->select(DB::raw('count(*) as ticked_count, status'))
        //         ->where('admin_id','=',$userlo)
        //         ->groupBy('status')
        //         ->get();

        //    return view('user_home',compact('status','tickets','users','supportcomp','assets','failures','plans','companies'));
        // }
        // else{
        //     return view('user_home',compact('users','tickets','status','assets','failures'));
        // }
        $peripherals= modeloPeripheral::all();
        // $assets = modeloAsset::All();
        $assets = DB::table('assets')->where('user_id','=',Auth::user()->id)->get();
        // $colas = DB::table('cola')->where('id_user','=',Auth::user()->id)->get();
        $prueba = Auth::user()->id;
        // DB::select("SELECT distinct cola.id FROM helpdesk.assets asset, helpdesk.cola cola
        // WHERE cola.id_asset=$request->id_asset and cola.state=1");
        $colas = DB::select("SELECT cola.id, cola.id_user, cola.id_tec, cola.tec_report, cola.user_report, cola.id_asset, cola.created, cola.attended, cola.priority, cola.state FROM helpdesk.cola cola where cola.id_user =$prueba ORDER BY cola.state ASC, cola.created ASC ");





        $reportes = DB::select("SELECT asset.id, asset.company_id, asset.assets_type_id, asset.brand_id, asset.model, asset.number, cola.id, cola.id_user, cola.id_tec, cola.tec_report, cola.user_report, cola.id_asset, cola.created, cola.attended, cola.priority, cola.state FROM helpdesk.assets asset, helpdesk.cola cola
        WHERE asset.id=cola.id_asset ORDER BY cola.state ASC,  cola.created ASC , cola.priority DESC");
        // return $reportes;
        
        $companies= modeloCompany::all();
        $brands= modeloBrand::All();
        $users = modeloUser::All();
        $cecos = modeloCeco::All();
        $consumables = modeloConsumable::All();
        $consumables_types = modeloConsumables_type::All();
        $brands= modeloBrand::All();
        $assets_types = modeloAsset_type::All();
        // return($assets);
        return view('user_home',compact('assets','users','cecos','consumables','brands','softwares','assets_types','companies','peripherals','brands','consumables_types','colas','reportes'));






    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



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
