<?php

namespace Helpdesk\Http\Controllers;


use Helpdesk\modeloAsset_history;
use Helpdesk\modeloAsset_type;
use Helpdesk\modeloBrand;
use Helpdesk\modeloCeco;
use Helpdesk\modeloCola;
use Helpdesk\modeloCompany;
use Helpdesk\modeloConsumable;
use Helpdesk\modeloConsumables_type;
use Helpdesk\modeloDepartment;
use Helpdesk\modeloModel;
use Helpdesk\modeloPeripheral;
use Helpdesk\modeloSoftware;
use Helpdesk\modeloSupplier;
use Helpdesk\modeloUser;
use Illuminate\Http\Request;
use Helpdesk\modeloAsset;
use Helpdesk\modeloAsset_peripheal;
// use Helpdesk\modeloAssets_has_peripheral;
use Helpdesk\Http\Requests\rqst_asset_create;
use Helpdesk\Http\Requests\rqst_asset_store;
use Helpdesk\Http\Requests\rqst_asset_update;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use DB;



class colaController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
               // $asset_historys= DB::table('asset_history')->where('asset_id', $id)->orderBy('created_at','desc')->get();
            //    $asset = modeloAsset::findOrFail($id);

            //    $users = modeloUser::All();
            //    $cecos = modeloCeco::All();
            //    $departments= modeloDepartment::all();
            //    $companys= modeloCompany::all();
            //    $asset_types= modeloAsset_type::all();
            //    $brands= modeloBrand::All();
            //    $softwares= modeloSoftware::All();
            //    $suppliers= modeloSupplier::all();
            //    $peripherals= modeloPeripheral::all();
               
            //    // dd($suppliers);
            //    return view('admin.cola.assets_report',['asset'=>$asset],compact('asset_historys','users','cecos','asset_types','brands','softwares','companies','ceco','departments','suppliers','companys','peripherals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      
        $user = modeloUser::findOrFail(Auth::user()->id);

        $verificar = DB::select("SELECT distinct cola.id FROM helpdesk.assets asset, helpdesk.cola cola
        WHERE cola.id_asset=$request->id_asset and cola.state=1");
        // return sizeof($verificar);
        if($request->boton=="Guardar") {
            if(sizeof($verificar)==0){
                $cola = new modeloCola();
                $cola->id_asset = $request->id_asset;
                $cola->id_user = Auth::user()->id;
                $cola->state = 1;
                $cola->priority = $user->priority;
                $cola->user_report = mb_strtoupper($request->user_report, 'UTF-8');        
                $cola->created = $todayDate = date("Y-m-d");
                $cola;
                $cola->save();
                Session::flash('message','El Reporte se ha Creado Exitosamente');
                $col= modeloCola::all();
                $cola_id= $col->last()->id;
                return response()->redirectToAction('colaController@edit', $cola_id);

                // return Redirect::to('/userhome');  
            }
            else{
                Session::flash('error','YA EXISTE UN REPORTE ACTUALMENTE ASOCIADO A ESE ACTIVO');
                return response()->redirectToAction('colaController@assestReport',$request->id_asset);

                // return Redirect::to('/userhome');  
            }
        } elseif ($request->boton=="Volver") {
            
            return Redirect::to('/userhome');  
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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

                // return 0;
                $reporte = DB::table('cola')->where('id','=',$id)->get();
                // $asset_historys= DB::table('asset_history')->where('asset_id', $id)->orderBy('created_at','desc')->get();
                $asset = modeloAsset::findOrFail($reporte[0]->id_asset);
                $users = modeloUser::All();
                $cecos = modeloCeco::All();
                $departments= modeloDepartment::all();
                $companys= modeloCompany::all();
                $asset_types= modeloAsset_type::all();
                $brands= modeloBrand::All();
                $softwares= modeloSoftware::All();
                $suppliers= modeloSupplier::all();
                $peripherals= modeloPeripheral::all();
                // dd($suppliers);
                return view('admin.cola.assets_reportEdit',['asset'=>$asset],compact('asset_historys','users','cecos','asset_types','brands','softwares','companies','ceco','departments','suppliers','companys','peripherals','reporte'));
      
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
        
        if($request->bandera==123){ //reporte del tecnico, bandera 123 es un valor puesto en el blade del tecnico
            if($request->boton=="Volver") {
                return Redirect::to('/userhome');
            } elseif ($request->boton=="Guardar") {
                $cola = modeloCola::findOrFail($id);
                $cola->id_tec = Auth::user()->id;
                $cola->tec_report = mb_strtoupper($request->tec_report, 'UTF-8');
                $cola->state = 2;
                $cola->attended = $todayDate = date("Y-m-d");
                $cola->save();
                Session::flash('message','El Reporte se ha Modificado Exitosamente');
                return response()->redirectToAction('colaController@reportHistory', $id);

                // return Redirect::to('/userhome');
                // return::to('/reportassets/')
                // href="{{asset('/reportassest/')}}/{{$asset->id}}
            }
        }
        else{// reporte del usuario
            if($request->boton=="Volver") {
                return Redirect::to('/userhome');
            } elseif ($request->boton=="Guardar") {
                $cola = modeloCola::findOrFail($id);
                $cola->user_report = mb_strtoupper($request->user_report, 'UTF-8');
                $cola->save();
                Session::flash('message','El Reporte se ha Modificado Exitosamente');
                return response()->redirectToAction('colaController@edit', $id);

                // return Redirect::to('/userhome'); 
            }
        }
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cola= modeloCola::findOrFail($id);
        $cola->delete();
        Session::flash('message','El Reporte se ha Eliminado Exitosamente');
        return Redirect::to('/userhome');
    }


    public function assestReport($id){
        
        // $asset_historys= DB::table('asset_history')->where('asset_id', $id)->orderBy('created_at','desc')->get();
        $asset = modeloAsset::findOrFail($id);

        $users = modeloUser::All();
        $cecos = modeloCeco::All();
        $departments= modeloDepartment::all();
        $companys= modeloCompany::all();
        $asset_types= modeloAsset_type::all();
        $brands= modeloBrand::All();
        $softwares= modeloSoftware::All();
        $suppliers= modeloSupplier::all();
        $peripherals= modeloPeripheral::all();
        
        // dd($suppliers);
        return view('admin.cola.assets_report',['asset'=>$asset],compact('asset_historys','users','cecos','asset_types','brands','softwares','companies','ceco','departments','suppliers','companys','peripherals'));
    }

    public function tecReport($id)
    {
        
                // $reporte = DB::table('cola')->where('id_asset','=',$id)->get();
                // $asset_historys= DB::table('asset_history')->where('asset_id', $id)->orderBy('created_at','desc')->get();
                $reporte = modeloCola::findOrFail($id);

                // return $reporte;
                $asset = modeloAsset::findOrFail($reporte->id_asset);
                $users = modeloUser::All();
                $cecos = modeloCeco::All();
                $departments= modeloDepartment::all();
                $companys= modeloCompany::all();
                $asset_types= modeloAsset_type::all();
                $brands= modeloBrand::All();
                $softwares= modeloSoftware::All();
                $suppliers= modeloSupplier::all();
                $peripherals= modeloPeripheral::all();
                // dd($suppliers);
                return view('admin.cola.assets_reportTec',['asset'=>$asset],compact('asset_historys','users','cecos','asset_types','brands','softwares','companies','ceco','departments','suppliers','companys','peripherals','reporte'));
     
    }

    public function reportHistory($id)
    {
        
                // $reporte = DB::table('cola')->where('id_asset','=',$id)->get();
                // $asset_historys= DB::table('asset_history')->where('asset_id', $id)->orderBy('created_at','desc')->get();
                
                $reporte = modeloCola::findOrFail($id);
                // return $reporte;
                $asset = modeloAsset::findOrFail($reporte->id_asset);
                $users = modeloUser::All();
                $cecos = modeloCeco::All();
                $departments= modeloDepartment::all();
                $companys= modeloCompany::all();
                $asset_types= modeloAsset_type::all();
                $brands= modeloBrand::All();
                $softwares= modeloSoftware::All();
                $suppliers= modeloSupplier::all();
                $peripherals= modeloPeripheral::all();
                // dd($suppliers);
                return view('admin.cola.assets_reportHistory',['asset'=>$asset],compact('asset_historys','users','cecos','asset_types','brands','softwares','companies','ceco','departments','suppliers','companys','peripherals','reporte'));
     
    }



}
