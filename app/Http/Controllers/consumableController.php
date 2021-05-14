<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\Http\Requests\rqst_consumable;
use Helpdesk\Http\Requests\rqst_consumable_edit;
use Illuminate\Http\Request;
use Helpdesk\modeloConsumable;
use Helpdesk\modeloAsset;
use Helpdesk\modeloUser;
use Helpdesk\modeloBrand;
use Helpdesk\modeloCeco;
use Helpdesk\modeloConsumable_History;
use Helpdesk\modeloConsumables_type;

use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use Redirect;

class consumableController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consumables= modeloConsumable::all();
        $cecos= modeloCeco::all();
        $brands= modeloBrand::all();
        $users= DB::select("SELECT DISTINCT u.id, concat(u.first_name, ' ', u.last_name) as name
        FROM helpdesk.users u, helpdesk.assets a
        where a.user_id = u.id and (a.assets_type_id=2 or a.assets_type_id=9) and a.company_id=1");
        $assets = modeloAsset::where('company_id','=' ,"1")
        ->where('assets_type_id','=' ,"2")
        ->orWhere('assets_type_id','=' ,"9")->get();
        return view('admin.inventario.consumibles.tableConsumable',compact('consumables','cecos','brands','users','assets'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assets = modeloAsset::where('company_id','=' ,"1")
        ->where('assets_type_id','=' ,"2")
        ->orWhere('assets_type_id','=' ,"9")->get();

        $users= DB::select("SELECT DISTINCT u.id, concat(u.first_name, ' ', u.last_name) as name
        FROM helpdesk.users u, helpdesk.assets a
        where a.user_id = u.id and (a.assets_type_id=2 or a.assets_type_id=9) and a.company_id=1"); 
        $brands= modeloBrand::all();

        return view('admin.inventario.consumibles.form_consu',compact('assets','users','brands'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rqst_consumable $request)
    {
        $consumable_history = new modeloConsumable_History($request->all());
        $consumable = new modeloConsumable($request->all());
        $consumable->assets_id=$request->asset;
        $consumable_history->assets_id=$request->asset;
        $consumable->user_id=$request->user;
        $consumable_history->user_id=$request->user;
        $consumable->type=$request->type;
        $consumable_history->type=$request->type;
        $consumable->brand_id=$request->brands_id;
        $consumable_history->brand_id=$request->brands_id;
        $consumable->model=mb_strtoupper($request->model, 'UTF-8');
        $consumable_history->model=mb_strtoupper($request->model, 'UTF-8');
        $consumable->min=$request->min;
        $consumable_history->min=$request->min;
        $consumable->max=$request->max;
        $consumable_history->max=$request->max;
        $consumable->stock=$request->stock;
        $consumable_history->stock=$request->stock;
        $consumable->use=$request->use;
        $consumable_history->use=$request->use;
        $consumable->recharge=$request->recharge;
        $consumable_history->recharge=$request->recharge;
        $consumable->damaged=$request->damaged;
        $consumable_history->damaged=$request->damaged;
        $consumable->enter=$request->enter;
        $consumable_history->enter=$request->enter;
        $consumable->replace=$request->replace;
        $consumable_history->replace=$request->replace;
        $consumable->description=mb_strtoupper($request->description, 'UTF-8');
        $consumable_history->description=mb_strtoupper($request->description, 'UTF-8');
        $consumable->document= Auth::user()->id;
        $consumable_history->document= Auth::user()->id;
        $asset = modeloAsset::where('id','=' ,$request->asset)->get();
        $consumable->ceco_id=$asset[0]->ceco_id;     
        $consumable_history->ceco_id=$asset[0]->ceco_id;     
        $consumable->save();
        $consu= modeloConsumable::all();
        $con= $consu->last()->id;
        $consumable_history->consumables_id= $con;
        $consumable_history->save();
        Session::flash('message','El Consumible se ha Creado Exitosamente');
        return response()->redirectToAction('consumableController@e', $con);

        return Redirect::to('/consumableController');
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
        $consumables=modeloConsumable::findorfail($id);
        return view('admin.inventario.consumibles.profile_consumable', compact('consumables'));
    }
    public function retornar(){
        return Redirect::to('/consumables');
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
        $consumables = modeloConsumable::findOrFail($id);
        $assets = modeloAsset::where('company_id','=' ,"1")
        ->where('assets_type_id','=' ,"2")
        ->orWhere('assets_type_id','=' ,"9")->get();

        $users= DB::select("SELECT DISTINCT u.id, concat(u.first_name, ' ', u.last_name) as name
        FROM helpdesk.users u, helpdesk.assets a
        where a.user_id = u.id and (a.assets_type_id=2 or a.assets_type_id=9) and a.company_id=1"); 
        $brands= modeloBrand::all();
        return view('admin.inventario.consumibles.consu_edit',['consumables'=>$consumables],compact('users','assets','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(rqst_consumable_edit $request, $id)
    {
        //
        $consumable = modeloConsumable::findOrFail($id);
        $consumable_history = new modeloConsumable_History($request->all());
        $consumable_history->consumables_id= $id;
        
        $consumable->assets_id=$request->asset;
        $consumable_history->assets_id=$request->asset;

        $consumable->user_id=$request->user;
        $consumable_history->user_id=$request->user;
        $consumable->type=$request->type;
        $consumable_history->type=$request->type;
        $consumable->brand_id=$request->brands_id;
        $consumable_history->brand_id=$request->brands_id;
        $consumable->model=mb_strtoupper($request->model, 'UTF-8');
        $consumable_history->model=mb_strtoupper($request->model, 'UTF-8');
        $consumable->min=$request->min;
        $consumable_history->min=$request->min;
        $consumable->max=$request->max;
        $consumable_history->max=$request->max;
        $consumable->stock=$request->stock + $request->enter - $request->replace;
        $consumable_history->stock=$request->stock + $request->enter - $request->replace;
        $consumable->use=$request->use;
        $consumable_history->use=$request->use;
        $consumable->recharge=$request->recharge;
        $consumable_history->recharge=$request->recharge;
        $consumable->damaged=$request->damaged;
        $consumable_history->damaged=$request->damaged;
        $consumable->enter=$request->enter;
        $consumable_history->enter=$request->enter;
        $consumable->replace=$request->replace;
        $consumable_history->replace=$request->replace;
        $consumable->description=mb_strtoupper($request->description, 'UTF-8');
        $consumable_history->description=mb_strtoupper($request->description, 'UTF-8');
        $consumable->document= Auth::user()->id;
        $consumable_history->document= Auth::user()->id;
        $asset = modeloAsset::where('id','=' ,$request->asset)->get();
        $consumable->ceco_id=$asset[0]->ceco_id;     
        $consumable_history->ceco_id=$asset[0]->ceco_id;     
        $consumable->save();
        $consumable_history->save();
        Session::flash('message','Consumible Actualizado Exitosamente');
        return response()->redirectToAction('consumableController@edit', $id);

        // return Redirect::to('/consumables');
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



    public function getAssetUser(Request $request, $id){
        if($request->json()){
            $assetUser = modeloAsset::assetUser($id);
            return response()->json($assetUser);
        }
    }


    public function consumableHistory($id){
        $consumable_historys= DB::table('consumables_history')->where('consumables_id', $id)->orderBy('created_at','desc')->get();
        $assets = modeloAsset::where('company_id','=' ,"1")
        ->where('assets_type_id','=' ,"2")
        ->orWhere('assets_type_id','=' ,"9")->get();
        $brands= modeloBrand::all();
        $users= DB::select("SELECT DISTINCT u.id, concat(u.first_name, ' ', u.last_name) as name
        FROM helpdesk.users u, helpdesk.assets a
        where a.user_id = u.id and (a.assets_type_id=2 or a.assets_type_id=9) and a.company_id=1");
        $admins= modeloUser::all(); 
        return view('admin.inventario.consumibles.consu_history',compact('consumable_historys','assets','users','brands','admins'));

    }

    public function cretornar(){
        return Redirect::to('/consumables');
    }

}
