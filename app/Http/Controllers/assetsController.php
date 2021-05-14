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


class assetsController extends Controller
{

    public function getConsu(Request $request, $id){
        if($request->json()){
            $consumables = modeloConsumable::consumible($id);
            return response()->json($consumables);
        }
    }

    public function getPdf(Request $request, $id){

        $cons = modeloConsumable::consumible($id);

    }

    public function getAsset(Request $request, $id){
        if($request->json()){
            $asset = modeloAsset::assets_user($id);
            return response()->json($asset);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peripherals= modeloPeripheral::all();
        $assets = modeloAsset::All();
        $companies= modeloCompany::all();
        $brands= modeloBrand::All();
        $users = modeloUser::All();
        $cecos = modeloCeco::All();
        $consumables = modeloConsumable::All();
        $consumables_types = modeloConsumables_type::All();
        $brands= modeloBrand::All();
        $assets_types = modeloAsset_type::All();

        return view('admin.inventario.pageinventory',compact('assets','users','cecos','consumables','brands','softwares','assets_types','companies','peripherals','brands','consumables_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datasheet = DB::select("SELECT type.name,  bran.name , peri.model, peri.serial
        FROM helpdesk.consumables_types type, helpdesk.peripheral peri, helpdesk.brands bran
        where peri.type=type.id and peri.brands_id=bran.id");
        
        $assets_types= modeloAsset_type::all();
        $brands= modeloBrand::All();
        $suppliers= modeloSupplier::All();
        $softwares= modeloSoftware::All();
        $consumables_types = modeloConsumables_type::All();
        $consumables = modeloConsumable::All();
        $users = modeloUser::All();
        $cecos = modeloCeco::All();
        $companies= modeloCompany::all();
        $departments= modeloDepartment::all();
        $peripherals= modeloPeripheral::all();
        return view('admin.inventario.activos.form_assets', compact('users','cecos','consumables','consumables_types','brands','softwares','companies','departments','assets_types','suppliers','peripherals'));
    }
    public function getModel(Request $request, $id){
        if($request->json()){
            $model = modeloModel::model($id);
            return response()->json($model);
        }
    }

    public function getCecoCompany(Request $request, $id){
        if($request->json()){
            $cecocompany = modeloCeco::cecobycompany($id);
            return response()->json($cecocompany);
        }
    }

    public function getCeco(Request $request, $id){
        if($request->json()){
            $depart = modeloDepartment::departmentbyceco($id);
            return response()->json($depart);
        }
    }

    public function getUser(Request $request, $id){
        if($request->json()){
            $user = modeloUser::user($id);
            return response()->json($user);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        //
    // dd($request);
        $asset_history = new modeloAsset_history();
        $datasheet = DB::select("select datasheet_id from assets where company_id = '$request->company_id' ORDER BY datasheet_id DESC limit 0,1; ");
        if (empty($datasheet)){
           $datasheet= "001";
        }
        else{
           $datasheet=++$datasheet[0]->datasheet_id;
           if(strlen($datasheet)< 3){
               while (strlen($datasheet)< 3){
                   $datasheet ="0".$datasheet;
               }
           }
        }
       //dd($datasheet);
        $Asset = new modeloAsset();
        if (Input::get('is_active')) {
            $Asset->is_active=1;
            $asset_history->is_active=1;
        } else {
            $Asset->is_active=0;
            $asset_history->is_active=0;
        }        
        $Asset->number= mb_strtoupper($request->number, 'UTF-8');
        $asset_history->number= mb_strtoupper($request->number, 'UTF-8');
        $Asset->model= mb_strtoupper($request->model, 'UTF-8');
        $asset_history->model= mb_strtoupper($request->model, 'UTF-8');
        $Asset->serial= mb_strtoupper($request->serial, 'UTF-8');
        $asset_history->serial= mb_strtoupper($request->serial, 'UTF-8');
        $Asset->ceco_id= $request->ceco_id;
        $asset_history->ceco_id= $request->ceco_id;
        $Asset->user_id= $request->user_id;
        $asset_history->user_id= $request->user_id;
        $Asset->datasheet_id= $datasheet;
        $asset_history->datasheet_id= $datasheet;
        $Asset->location= mb_strtoupper($request->location, 'UTF-8');
        $asset_history->location= mb_strtoupper($request->location, 'UTF-8');
        $Asset->assets_type_id= $request->assets_type_id;
        $asset_history->assets_type_id= $request->assets_type_id;
        $Asset->condition= mb_strtoupper($request->condition, 'UTF-8');
        $asset_history->condition= mb_strtoupper($request->condition, 'UTF-8');
        if($request->condition==4){
            $Asset->number= "N/A";
            $asset_history->number="N/A";
        }
        $Asset->brand_id= $request->brand_id;
        $asset_history->brand_id= $request->brand_id;
        $Asset->software_id= $request->software_id;
        $asset_history->software_id= $request->software_id;
        $Asset->bill_at= $request->bill_at;
        $asset_history->bill_at= $request->bill_at;
        $Asset->nro_order= mb_strtoupper($request->nro_order, 'UTF-8');
        $asset_history->nro_order= mb_strtoupper($request->nro_order, 'UTF-8');
        $Asset->cost= mb_strtoupper($request->cost, 'UTF-8');
        $asset_history->cost= mb_strtoupper($request->cost, 'UTF-8');
        $Asset->warranty= mb_strtoupper($request->warranty, 'UTF-8');
        $asset_history->warranty= mb_strtoupper($request->warranty, 'UTF-8');
        $Asset->warranty_end= $request->warranty_end;
        $asset_history->warranty_end= $request->warranty_end;
        $Asset->supplier_id= $request->supplier_id;
        $asset_history->supplier_id= $request->supplier_id;
        $Asset->description= mb_strtoupper($request->description, 'UTF-8');
        $asset_history->description= mb_strtoupper($request->description, 'UTF-8');
        $Asset->supervised= $request->supervised;
        $asset_history->supervised= $request->supervised;
        $Asset->instalation_at= $request->instalation_at;
        $asset_history->instalation_at= $request->instalation_at;
        $Asset->operation_at = $request->operation_at;
        $asset_history->operation_at = $request->operation_at;
        $Asset->installed=$request->installed;
        $asset_history->installed=$request->installed;
        $Asset->company_id=$request->company_id;
        $asset_history->company_id=$request->company_id;
        $Asset->other_peripheral= mb_strtoupper($request->other_peripheral, 'UTF-8');
        $asset_history->other_peripheral= mb_strtoupper($request->other_peripheral, 'UTF-8');
        $Asset->document= Auth::user()->id;
        $asset_history->document= Auth::user()->id;
        $Asset->motherboard = mb_strtoupper($request->motherboard, 'UTF-8');
        $asset_history->motherboard= mb_strtoupper($request->motherboard, 'UTF-8');
        $Asset->processor= mb_strtoupper($request->processor, 'UTF-8');
        $asset_history->processor= mb_strtoupper($request->HDD, 'UTF-8');
        $Asset->HDD= mb_strtoupper($request->HDD, 'UTF-8');
        $asset_history->HDD= mb_strtoupper($request->HDD, 'UTF-8');
        $Asset->CDDVD= mb_strtoupper($request->CDDVD, 'UTF-8');
        $asset_history->CDDVD= mb_strtoupper($request->CDDVD, 'UTF-8');
        $Asset->RAM= mb_strtoupper($request->RAM, 'UTF-8');
        $asset_history->RAM= mb_strtoupper($request->RAM, 'UTF-8');
        $Asset->floppy= mb_strtoupper($request->floppy, 'UTF-8');
        $asset_history->floppy= mb_strtoupper($request->floppy, 'UTF-8');
        $asset_history->department_id= $request->department;
        $Asset->department_id= $request->department;


  
        //dd($request);


        if (Input::get('teclado_is_active')) {
            $asset_history->tmodel= mb_strtoupper($request->tmodel, 'UTF-8');
            $Asset->tmodel= mb_strtoupper($request->tmodel, 'UTF-8');

            $asset_history->tserial= mb_strtoupper($request->tserial, 'UTF-8');
            $Asset->tserial= mb_strtoupper($request->tserial, 'UTF-8');

            $asset_history->tbrands_id= $request->tbrands_id;
            $Asset->tbrands_id= $request->tbrands_id;

        }

        if (Input::get('mouse_is_active')) {
            $asset_history->mmodel= mb_strtoupper($request->mmodel, 'UTF-8');
            $Asset->mmodel= mb_strtoupper($request->mmodel, 'UTF-8');

            $asset_history->mserial= mb_strtoupper($request->mserial, 'UTF-8');
            $Asset->mserial= mb_strtoupper($request->mserial, 'UTF-8');

            $asset_history->mbrands_id= $request->mbrands_id;
            $Asset->mbrands_id= $request->mbrands_id;

        }
        if (Input::get('reg/ups_is_active')) {
            $asset_history->rmodel= mb_strtoupper($request->rmodel, 'UTF-8');
            $Asset->rmodel= mb_strtoupper($request->rmodel, 'UTF-8');

            $asset_history->rserial= mb_strtoupper($request->rserial, 'UTF-8');
            $Asset->rserial= mb_strtoupper($request->rserial, 'UTF-8');

            $asset_history->rbrands_id= $request->rbrands_id;
            $Asset->rbrands_id= $request->rbrands_id;

        }        
        if (Input::get('other_is_active')) {
            $asset_history->omodel= mb_strtoupper($request->omodel, 'UTF-8');
            $Asset->omodel= mb_strtoupper($request->omodel, 'UTF-8');

            $asset_history->oserial= mb_strtoupper($request->oserial, 'UTF-8');
            $Asset->oserial= mb_strtoupper($request->oserial, 'UTF-8');

            $asset_history->obrands_id= $request->obrands_id;
            $Asset->obrands_id= $request->obrands_id;
            
        }
        $Asset->save();
        $as= modeloAsset::all();
        $activo= $as->last()->id;
        $asset_history->asset_id= $activo;
        $asset_history->save();
        
        
        // modeloUser::create($request->all());

        Session::flash('message','El Activo se ha Creado Exitosamente');
        return response()->redirectToAction('assetsController@edit', $activo);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //     //
    //     //
    //     $asset = modeloAsset::findOrFail($id);
    //     $users = modeloUser::All();
    //     $usuario = modeloUser::findOrFail($asset->user_id);
    //     $cecos = modeloCeco::All();
    //     $ceco = modeloCeco::findOrFail($asset->ceco_id);
    //     $departments= modeloDepartment::all();
    //     $companys= modeloCompany::all();
    //     $companies= modeloCompany::findOrFail($ceco->company_id);
    //     $asset_detail= modeloAsset_detail::where('asset_id',$asset->id)->get();
    //     $asset_types= modeloAsset_type::all();
    //     $brands= modeloBrand::All();
    //     $softwares= modeloSoftware::All();
    //     $supplier_asset= modeloSupplier::FindOrFail($asset->supplier_id);
    //     $suppliers= modeloSupplier::all();
    //     $peripherals= modeloPeripheral::all();
    //     $assets_has_peripherals= DB::table('assets_has_peripheral')->where('assets_id', $id)->get();



    //    // dd($suppliers);
    //     return view('admin.inventario.activos.profile_assets',['asset'=>$asset],compact('users','cecos','supplier_asset','asset_types','brands','softwares','companies','ceco','departments','asset_detail','suppliers','companys','usuario','peripherals','assets_has_peripherals'));





        $asset= modeloAsset::findOrFail($id);
        $assets_types= modeloAsset_type::all();
        $brands= modeloBrand::All();
        $suppliers= modeloSupplier::FindOrFail($asset->supplier_id);
        $softwares= modeloSoftware::All();
        $consumables_types = modeloConsumables_type::All();
        $consumables = modeloConsumable::All();
        $users = modeloUser::All();
        $cecos = modeloCeco::find($asset->ceco_id);
       // dd(empty($asset_detail[0]));
        $companies= modeloCompany::findOrFail($cecos->company_id);
        $departments= DB::select("select * from departments where ceco_id = '$cecos->id' ");
        $departments= $departments[0]->name;

        return view('admin.inventario.activos.profile_assets', compact('users','asset','cecos','peripherals','asset_d','consumables','consumables_types','brands','softwares','companies','departments','assets_types','suppliers'));
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
        
        $asset = modeloAsset::findOrFail($id);
        $users = modeloUser::All();
        $usuario = modeloUser::findOrFail($asset->user_id);
        $cecos = modeloCeco::All();
        $ceco = modeloCeco::findOrFail($asset->ceco_id);
        $departments= modeloDepartment::all();
        $companys= modeloCompany::all();
        $asset_types= modeloAsset_type::all();
        $brands= modeloBrand::All();
        $softwares= modeloSoftware::All();
        $supplier_asset= modeloSupplier::Find($asset->supplier_id);
        $suppliers= modeloSupplier::all();
        $peripherals= modeloPeripheral::all();
        // $assets_has_peripherals= DB::table('assets_has_peripheral')->where('assets_id', $id)->get();



       // dd($suppliers);
        return view('admin.inventario.activos.assets_editar',['asset'=>$asset],compact('users','cecos','supplier_asset','asset_types','brands','softwares','companies','ceco','departments','suppliers','companys','usuario','peripherals','assets_has_peripherals'));
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
        $Asset = modeloAsset::findOrFail($id);

        if($Asset->company_id!=$request->company_id){ 
            $Asset->number= "N/A";
            $Asset->condition=4;
            $Asset->save();
            $asset_history = new modeloAsset_history();
            $asset_history->number= mb_strtoupper($request->number, 'UTF-8');
            $asset_history->model= mb_strtoupper($request->model, 'UTF-8');
            $asset_history->serial= mb_strtoupper($request->serial, 'UTF-8');
            $asset_history->ceco_id= $request->ceco_id;
            $asset_history->user_id= $request->user;
            $datasheet = DB::select("select datasheet_id from assets where company_id = '$request->company_id' ORDER BY datasheet_id DESC limit 0,1; ");
            if (empty($datasheet)){
               $datasheet= "001";
            }
            else{
               $datasheet=++$datasheet[0]->datasheet_id;
               if(strlen($datasheet)< 3){
                   while (strlen($datasheet)< 3){
                       $datasheet ="0".$datasheet;
                   }
               }
            }
            $asset_history->datasheet_id= $datasheet;
            $asset_history->location= mb_strtoupper($request->location, 'UTF-8');
            $asset_history->assets_type_id= $request->assets_type_id;
            $asset_history->condition= mb_strtoupper($request->condition, 'UTF-8');
            $asset_history->brand_id= $request->brand_id;
            $asset_history->software_id= $request->software_id;
            $asset_history->bill_at= $request->bill_at;
            $asset_history->nro_order= mb_strtoupper($request->nro_order, 'UTF-8');
            $asset_history->cost= mb_strtoupper($request->cost, 'UTF-8');
            $asset_history->warranty= mb_strtoupper($request->warranty, 'UTF-8');
            $asset_history->warranty_end= $request->warranty_end;
            $asset_history->supplier_id= $request->supplier_id;
            $asset_history->description= mb_strtoupper($request->description, 'UTF-8');
            $asset_history->supervised= $request->supervised;
            $asset_history->instalation_at= $request->instalation_at;
            $asset_history->operation_at = $request->operation_at;
            $asset_history->installed=$request->installed;
            $asset_history->company_id=$request->company_id;
            $asset_history->other_peripheral= mb_strtoupper($request->other_peripheral, 'UTF-8');
            $asset_history->document= Auth::user()->id;
            $asset_history->motherboard= mb_strtoupper($request->motherboard, 'UTF-8');
            $asset_history->processor= mb_strtoupper($request->HDD, 'UTF-8');
            $asset_history->HDD= mb_strtoupper($request->HDD, 'UTF-8');
            $asset_history->CDDVD= mb_strtoupper($request->CDDVD, 'UTF-8');
            $asset_history->RAM= mb_strtoupper($request->RAM, 'UTF-8');
            $asset_history->floppy= mb_strtoupper($request->floppy, 'UTF-8');
            $asset_history->department_id= $request->department;
            if (Input::get('teclado_is_active')) {
                $asset_history->tmodel= mb_strtoupper($request->tmodel, 'UTF-8');
                $asset_history->tserial= mb_strtoupper($request->tserial, 'UTF-8');
                $asset_history->tbrands_id= $request->tbrands_id;
            }
            if (Input::get('mouse_is_active')) {
                $asset_history->mmodel= mb_strtoupper($request->mmodel, 'UTF-8');
                $asset_history->mserial= mb_strtoupper($request->mserial, 'UTF-8');
                $asset_history->mbrands_id= $request->mbrands_id;
            }
            if (Input::get('reg/ups_is_active')) {
                $asset_history->rmodel= mb_strtoupper($request->rmodel, 'UTF-8');
                $asset_history->rserial= mb_strtoupper($request->rserial, 'UTF-8');
                $asset_history->rbrands_id= $request->rbrands_id;
            }        
            if (Input::get('other_is_active')) {
                $asset_history->omodel= mb_strtoupper($request->omodel, 'UTF-8');
                $asset_history->oserial= mb_strtoupper($request->oserial, 'UTF-8');
                $asset_history->obrands_id= $request->obrands_id;
            }    
            $asset_history->asset_id= $id;
            $asset_history->save();




            $asset_history = new modeloAsset_history();
            $datasheet = DB::select("select datasheet_id from assets where company_id = '$request->company_id' ORDER BY datasheet_id DESC limit 0,1; ");
            if (empty($datasheet)){
               $datasheet= "001";
            }
            else{
               $datasheet=++$datasheet[0]->datasheet_id;
               if(strlen($datasheet)< 3){
                   while (strlen($datasheet)< 3){
                       $datasheet ="0".$datasheet;
                   }
               }
            }
           //dd($datasheet);
            $Asset = new modeloAsset();
            if (Input::get('is_active')) {
                $Asset->is_active=1;
                $asset_history->is_active=1;
            } else {
                $Asset->is_active=0;
                $asset_history->is_active=0;
            }        
            $Asset->number= mb_strtoupper($request->number, 'UTF-8');
            $asset_history->number= mb_strtoupper($request->number, 'UTF-8');
            $Asset->model= mb_strtoupper($request->model, 'UTF-8');
            $asset_history->model= mb_strtoupper($request->model, 'UTF-8');
            $Asset->serial= mb_strtoupper($request->serial, 'UTF-8');
            $asset_history->serial= mb_strtoupper($request->serial, 'UTF-8');
            $Asset->ceco_id= $request->ceco_id;
            $asset_history->ceco_id= $request->ceco_id;
            $Asset->user_id= $request->user;
            $asset_history->user_id= $request->user;
            $Asset->datasheet_id= $datasheet;
            $asset_history->datasheet_id= $datasheet;
            $Asset->location= mb_strtoupper($request->location, 'UTF-8');
            $asset_history->location= mb_strtoupper($request->location, 'UTF-8');
            $Asset->assets_type_id= $request->assets_type_id;
            $asset_history->assets_type_id= $request->assets_type_id;
            $Asset->condition= mb_strtoupper($request->condition, 'UTF-8');
            $asset_history->condition= mb_strtoupper($request->condition, 'UTF-8');
            if($request->condition==4){
                $Asset->number= "N/A";
                $asset_history->number="N/A";
            }
            $Asset->brand_id= $request->brand_id;
            $asset_history->brand_id= $request->brand_id;
            $Asset->software_id= $request->software_id;
            $asset_history->software_id= $request->software_id;
            $Asset->bill_at= $request->bill_at;
            $asset_history->bill_at= $request->bill_at;
            $Asset->nro_order= mb_strtoupper($request->nro_order, 'UTF-8');
            $asset_history->nro_order= mb_strtoupper($request->nro_order, 'UTF-8');
            $Asset->cost= mb_strtoupper($request->cost, 'UTF-8');
            $asset_history->cost= mb_strtoupper($request->cost, 'UTF-8');
            $Asset->warranty= mb_strtoupper($request->warranty, 'UTF-8');
            $asset_history->warranty= mb_strtoupper($request->warranty, 'UTF-8');
            $Asset->warranty_end= $request->warranty_end;
            $asset_history->warranty_end= $request->warranty_end;
            $Asset->supplier_id= $request->supplier_id;
            $asset_history->supplier_id= $request->supplier_id;
            $Asset->description= mb_strtoupper($request->description, 'UTF-8');
            $asset_history->description= mb_strtoupper($request->description, 'UTF-8');
            $Asset->supervised= $request->supervised;
            $asset_history->supervised= $request->supervised;
            $Asset->instalation_at= $request->instalation_at;
            $asset_history->instalation_at= $request->instalation_at;
            $Asset->operation_at = $request->operation_at;
            $asset_history->operation_at = $request->operation_at;
            $Asset->installed=$request->installed;
            $asset_history->installed=$request->installed;
            $Asset->company_id=$request->company_id;
            $asset_history->company_id=$request->company_id;
            $Asset->other_peripheral= mb_strtoupper($request->other_peripheral, 'UTF-8');
            $asset_history->other_peripheral= mb_strtoupper($request->other_peripheral, 'UTF-8');
            $Asset->document= Auth::user()->id;
            $asset_history->document= Auth::user()->id;
            $Asset->motherboard = mb_strtoupper($request->motherboard, 'UTF-8');
            $asset_history->motherboard= mb_strtoupper($request->motherboard, 'UTF-8');
            $Asset->processor= mb_strtoupper($request->processor, 'UTF-8');
            $asset_history->processor= mb_strtoupper($request->HDD, 'UTF-8');
            $Asset->HDD= mb_strtoupper($request->HDD, 'UTF-8');
            $asset_history->HDD= mb_strtoupper($request->HDD, 'UTF-8');
            $Asset->CDDVD= mb_strtoupper($request->CDDVD, 'UTF-8');
            $asset_history->CDDVD= mb_strtoupper($request->CDDVD, 'UTF-8');
            $Asset->RAM= mb_strtoupper($request->RAM, 'UTF-8');
            $asset_history->RAM= mb_strtoupper($request->RAM, 'UTF-8');
            $Asset->floppy= mb_strtoupper($request->floppy, 'UTF-8');
            $asset_history->floppy= mb_strtoupper($request->floppy, 'UTF-8');
            $asset_history->department_id= $request->department;
            $Asset->department_id= $request->department;
    
    
      
            //dd($request);
    
    
            if (Input::get('teclado_is_active')) {
                $asset_history->tmodel= mb_strtoupper($request->tmodel, 'UTF-8');
                $Asset->tmodel= mb_strtoupper($request->tmodel, 'UTF-8');
    
                $asset_history->tserial= mb_strtoupper($request->tserial, 'UTF-8');
                $Asset->tserial= mb_strtoupper($request->tserial, 'UTF-8');
    
                $asset_history->tbrands_id= $request->tbrands_id;
                $Asset->tbrands_id= $request->tbrands_id;
    
            }
    
            if (Input::get('mouse_is_active')) {
                $asset_history->mmodel= mb_strtoupper($request->mmodel, 'UTF-8');
                $Asset->mmodel= mb_strtoupper($request->mmodel, 'UTF-8');
    
                $asset_history->mserial= mb_strtoupper($request->mserial, 'UTF-8');
                $Asset->mserial= mb_strtoupper($request->mserial, 'UTF-8');
    
                $asset_history->mbrands_id= $request->mbrands_id;
                $Asset->mbrands_id= $request->mbrands_id;
    
            }
            if (Input::get('reg/ups_is_active')) {
                $asset_history->rmodel= mb_strtoupper($request->rmodel, 'UTF-8');
                $Asset->rmodel= mb_strtoupper($request->rmodel, 'UTF-8');
    
                $asset_history->rserial= mb_strtoupper($request->rserial, 'UTF-8');
                $Asset->rserial= mb_strtoupper($request->rserial, 'UTF-8');
    
                $asset_history->rbrands_id= $request->rbrands_id;
                $Asset->rbrands_id= $request->rbrands_id;
    
            }        
            if (Input::get('other_is_active')) {
                $asset_history->omodel= mb_strtoupper($request->omodel, 'UTF-8');
                $Asset->omodel= mb_strtoupper($request->omodel, 'UTF-8');
    
                $asset_history->oserial= mb_strtoupper($request->oserial, 'UTF-8');
                $Asset->oserial= mb_strtoupper($request->oserial, 'UTF-8');
    
                $asset_history->obrands_id= $request->obrands_id;
                $Asset->obrands_id= $request->obrands_id;
                
            }
            $Asset->save();
            $as= modeloAsset::all();
            $activo= $as->last()->id;
            $asset_history->asset_id= $activo;
            $asset_history->save();
        
        }else{ 
        
            $asset_history = new modeloAsset_history();
            $asset_history->asset_id=$id;

            $Asset = modeloAsset::findOrFail($id);
            // $Asset->fill($request->all());
            $asset_history->datasheet_id=$Asset->datasheet_id;
            

            // if($Asset->company_id!=$request->company_id){ 

            //     $datasheet = DB::select("select datasheet_id from assets where company_id = '$request->company_id' ORDER BY datasheet_id DESC limit 0,1; ");
            //     if (empty($datasheet)){
            //     $datasheet= "001";
            //     }
            //     else{
            //     $datasheet=++$datasheet[0]->datasheet_id;
            //     if(strlen($datasheet)< 3){
            //         while (strlen($datasheet)< 3){
            //             $datasheet ="0".$datasheet;
            //         }
            //     }
            //     }
                
            //     $Asset->datasheet_id= $datasheet;

            //     $asset_history->datasheet_id= $datasheet;
            // }
        //dd($datasheet);
            if (Input::get('is_active')) {
                $Asset->is_active=1;
            } else {
                $Asset->is_active=0;
            }

            if(!$request->number){
                $Asset->number= "N/A";
                $asset_history->number= "N/A";

            }else{
                $Asset->number= mb_strtoupper($request->number, 'UTF-8');
                $asset_history->number= mb_strtoupper($request->number, 'UTF-8');

            }
            $Asset->model= mb_strtoupper($request->model, 'UTF-8');
            $asset_history->model= mb_strtoupper($request->model, 'UTF-8');
            $Asset->serial= mb_strtoupper($request->serial, 'UTF-8');
            $asset_history->serial= mb_strtoupper($request->serial, 'UTF-8');
            $Asset->ceco_id= $request->ceco_id;
            $asset_history->ceco_id= $request->ceco_id;
            $asset_history->department_id= $request->department;
            $Asset->department_id= $request->department;
            $Asset->user_id= $request->user;
            $asset_history->user_id= $request->user;
            $Asset->location= mb_strtoupper($request->location, 'UTF-8');
            $asset_history->location= mb_strtoupper($request->location, 'UTF-8');
            $Asset->assets_type_id= $request->assets_type_id;
            $asset_history->assets_type_id= $request->assets_type_id;
            $Asset->condition= mb_strtoupper($request->condition, 'UTF-8');
            $asset_history->condition= mb_strtoupper($request->condition, 'UTF-8');
            if($request->condition==4){
                $Asset->number= "N/A";
                $asset_history->number= "N/A";
            }
            $Asset->brand_id= $request->brand_id;
            $asset_history->brand_id= $request->brand_id;
            $Asset->software_id= $request->software_id;
            $asset_history->software_id= $request->software_id;
            $Asset->bill_at= $request->bill_at;
            $asset_history->bill_at= $request->bill_at;
            $Asset->nro_order= mb_strtoupper($request->nro_order, 'UTF-8');
            $asset_history->nro_order=   mb_strtoupper($request->nro_order, 'UTF-8');
            $Asset->cost= mb_strtoupper($request->cost, 'UTF-8');
            $asset_history->cost= $request->cost;
            $Asset->warranty= mb_strtoupper($request->warranty, 'UTF-8');
            $asset_history->warranty= mb_strtoupper($request->warranty, 'UTF-8');
            $Asset->warranty_end= $request->warranty_end;
            $asset_history->warranty_end= $request->warranty_end;
            $Asset->supplier_id= $request->supplier_id;
            $asset_history->supplier_id= $request->supplier_id;
            $Asset->description= mb_strtoupper($request->description, 'UTF-8');
            $asset_history->description= mb_strtoupper($request->description, 'UTF-8');
            $Asset->supervised= mb_strtoupper($request->supervised, 'UTF-8');
            $asset_history->supervised= mb_strtoupper($request->supervised, 'UTF-8');
            $Asset->instalation_at= $request->instalation_at;
            $asset_history->instalation_at= $request->instalation_at;
            $Asset->operation_at = $request->operation_at;
            $asset_history->operation_at = $request->operation_at;
            $Asset->installed= mb_strtoupper($request->installed, 'UTF-8');
            $asset_history->installed=mb_strtoupper($request->installed, 'UTF-8');
            $Asset->company_id= $request->company_id;
            $asset_history->company_id=$request->company_id;
            
            $Asset->other_peripheral= mb_strtoupper($request->other_peripheral, 'UTF-8');
            $asset_history->other_peripheral= $request->other_peripheral;
            $Asset->document= Auth::user()->id;
            $asset_history->document= Auth::user()->id;
            $Asset->motherboard = mb_strtoupper($request->motherboard, 'UTF-8');
            $asset_history->motherboard= mb_strtoupper($request->motherboard, 'UTF-8');
            $Asset->processor= mb_strtoupper($request->processor, 'UTF-8');
            $asset_history->processor= mb_strtoupper($request->HDD, 'UTF-8');
            $Asset->HDD= mb_strtoupper($request->HDD, 'UTF-8');
            $asset_history->HDD= mb_strtoupper($request->HDD, 'UTF-8');
            $Asset->CDDVD= mb_strtoupper($request->CDDVD, 'UTF-8');
            $asset_history->CDDVD= mb_strtoupper($request->CDDVD, 'UTF-8');
            $Asset->RAM= mb_strtoupper($request->RAM, 'UTF-8');
            $asset_history->RAM= mb_strtoupper($request->RAM, 'UTF-8');
            $Asset->floppy= mb_strtoupper($request->floppy, 'UTF-8');
            $asset_history->floppy= mb_strtoupper($request->floppy, 'UTF-8');



            if (Input::get('teclado_is_active')) {
                $asset_history->tmodel= mb_strtoupper($request->tmodel, 'UTF-8');
                $Asset->tmodel= mb_strtoupper($request->tmodel, 'UTF-8');

                $asset_history->tserial= mb_strtoupper($request->tserial, 'UTF-8');
                $Asset->tserial= mb_strtoupper($request->tserial, 'UTF-8');

                $asset_history->tbrands_id= $request->tbrands_id;
                $Asset->tbrands_id= $request->tbrands_id;

            }else {
                $asset_history->tmodel= null;
                $Asset->tmodel= null;

                $asset_history->tserial= null;
                $Asset->tserial= null;

                $asset_history->tbrands_id= null;
                $Asset->tbrands_id= null;
            }


            if (Input::get('mouse_is_active')) {
                $asset_history->mmodel= mb_strtoupper($request->mmodel, 'UTF-8');
                $Asset->mmodel= mb_strtoupper($request->mmodel, 'UTF-8');

                $asset_history->mserial= mb_strtoupper($request->mserial, 'UTF-8');
                $Asset->mserial= mb_strtoupper($request->mserial, 'UTF-8');

                $asset_history->mbrands_id= $request->mbrands_id;
                $Asset->mbrands_id= $request->mbrands_id;
            }else {
                $asset_history->mmodel= null;
                $Asset->mmodel= null;

                $asset_history->mserial= null;
                $Asset->mserial= null;

                $asset_history->mbrands_id= null;
                $Asset->mbrands_id= null;
            }




            if (Input::get('reg/ups_is_active')) {
                $asset_history->rmodel= mb_strtoupper($request->rmodel, 'UTF-8');
                $Asset->rmodel= mb_strtoupper($request->rmodel, 'UTF-8');

                $asset_history->rserial= mb_strtoupper($request->rserial, 'UTF-8');
                $Asset->rserial= mb_strtoupper($request->rserial, 'UTF-8');

                $asset_history->rbrands_id= $request->rbrands_id;
                $Asset->rbrands_id= $request->rbrands_id;
            }else {
                $asset_history->rmodel= null;
                $Asset->rmodel= null;

                $asset_history->rserial= null;
                $Asset->rserial= null;

                $asset_history->rbrands_id= null;
                $Asset->rbrands_id= null;
            }


            if (Input::get('other_is_active')) {
                $asset_history->omodel= mb_strtoupper($request->omodel, 'UTF-8');
                $Asset->omodel= mb_strtoupper($request->omodel, 'UTF-8');

                $asset_history->oserial= mb_strtoupper($request->oserial, 'UTF-8');
                $Asset->oserial= mb_strtoupper($request->oserial, 'UTF-8');

                $asset_history->obrands_id= $request->obrands_id;
                $Asset->obrands_id= $request->obrands_id;
            }else {
                $asset_history->omodel= null;
                $Asset->omodel= null;

                $asset_history->oserial= null;
                $Asset->oserial= null;

                $asset_history->obrands_id= null;
                $Asset->obrands_id= null;
            }


            $Asset->save();
            $asset_history->save();

        }
  
        if($request->boton=="Volver") {
            
            return Redirect::to('/assets');
        
            
        } elseif ($request->boton=="Guardar") {
            
            
            Session::flash('message','Activo Actualizado Exitosamente');
            return response()->redirectToAction('assetsController@edit', $id);
        }
        // Session::flash('message','Activo Actualizado Exitosamente');
        // return Redirect::to('/assets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        modeloUser::destroy($id);
        Session::flash('message','El Usuario se ha Eliminado Exitosamente');
        return Redirect::to('/users');
    }

    public function aretornar(){
        return Redirect::to('/assets');
    }


    public function assestHistory($id){
                //
                // return $history= DB::table('asset_history')->where('asset_id', $id)->get();
                // // return $usuario= DB::table('users')->where('id', $asset->user_id)->get();
                // //paso de json a array
                // $invertir =json_decode($history, true);
                // //invierto el array
                // $invertir= array_reverse ($invertir);
                // //paso de array a json
                // return $asset_historys=json_encode($invertir);


                $asset_historys= DB::table('asset_history')->where('asset_id', $id)->orderBy('created_at','desc')->get();

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
                return view('admin.inventario.activos.assets_history',compact('asset_historys','users','cecos','asset_types','brands','softwares','companies','ceco','departments','suppliers','companys','peripherals'));
    }



    // public function assestReport($id){

    //     // $asset_historys= DB::table('asset_history')->where('asset_id', $id)->orderBy('created_at','desc')->get();
    //     $asset = modeloAsset::findOrFail($id);

    //     $users = modeloUser::All();
    //     $cecos = modeloCeco::All();
    //     $departments= modeloDepartment::all();
    //     $companys= modeloCompany::all();
    //     $asset_types= modeloAsset_type::all();
    //     $brands= modeloBrand::All();
    //     $softwares= modeloSoftware::All();
    //     $suppliers= modeloSupplier::all();
    //     $peripherals= modeloPeripheral::all();
        
    //     // dd($suppliers);
    //     return view('admin.inventario.activos.assets_report',['asset'=>$asset],compact('asset_historys','users','cecos','asset_types','brands','softwares','companies','ceco','departments','suppliers','companys','peripherals'));
    // }

    // public function retunReport(){
    //     return Redirect::to('/userhome');
    // }

    // public function userReport(Request $request){
    //     return($request->id);
    //     return Redirect::to('/userhome');
    // }

}
