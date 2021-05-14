<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloAsset;
use Helpdesk\modeloAsset_detail;
use Helpdesk\modeloAsset_type;
use Helpdesk\modeloBrand;
use Helpdesk\modeloCeco;
use Helpdesk\modeloCompany;
use Helpdesk\modeloDepartment;
use Helpdesk\modeloPlanning;
use Helpdesk\modeloSoftware;
use Helpdesk\modeloSolution;
use Helpdesk\modeloSupplier;
use Helpdesk\modeloPeripheral;
use Helpdesk\modeloAssets_has_peripheral;

use Helpdesk\modeloSupport_companies;
use Helpdesk\modeloticket;
use Helpdesk\modeloticket_solution;
use Helpdesk\modeloUser;
use Illuminate\Http\Request;

use Redirect;
use Input;
use Session;
use Mail;
use DB;

class generarController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies= modeloCompany::all();
        $users= modeloUser::all();
        $cecos= modeloCeco::all();
        return view('admin.reportes.report',compact('users','companies','cecos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sortFunction( $a, $b ) {
        return $a["datasheet_id"] - $b["datasheet_id"];
    }

    public function imprimir($id){

       $ticket = modeloticket::findorFail($id);
       $asset = modeloAsset::find($ticket->asset_id);
       $ceco = modeloCeco::find($asset->ceco_id);
       $depart = modeloDepartment::deparmentbyceco($ceco->id);
       $zona = $depart[0]->name;
       $company = modeloCompany::find($ceco->company_id);
       $software = modeloSoftware::find($asset->software_id);
       $user = modeloUser::find($asset->user_id);
       $solucion = modeloticket_solution::getsolutiontick($id);
       $sol = count($solucion);
       $usuario= $user->first_name.' '.$user->last_name;
       $admin_t = modeloUser::findorFail($ticket->admin_id);
       $admin= $admin_t->first_name.' '.$admin_t->last_name;

        $fechav = DB::select("select date_format(working_at, '%d-%m-%Y') as fecha from tickets where id = $ticket->id") ;

     // dd($ticket->failure_id);
        //motivo de la visita
       if($ticket->failure_id==4){
           $type_preve= 1;
           $type_correc=0;

       }else{
           $type_preve= 0;
           $type_correc=1;
       }
//estatus de caso
       if (($ticket->status== 'CLOSED')OR ($ticket->status== 'SOLVED')) {
           $est1=0;
           $est2=0;
           $est3=1;
       }else {
           if($ticket->status== 'WORKING'){
               $est1=1;
               $est2=0;
               $est3=0;
           }else{
                   $est1=0;
                   $est2=1;
                   $est3=0;
           }
       }
//Solucion
        if($sol==0){
           $solus= 'N/A';
        }else{
           $solus=$solucion;
        }
        //nro de caso
        $fecha = DB::select("select date_format(working_at, '%d%m%Y') as fecha from tickets where id = $ticket->id") ;
        $caso= $user->first_name[0].$user->last_name[0]. $fecha[0]->fecha;

        $fechav = DB::select("select date_format(working_at, '%d-%m-%Y') as fecha from tickets where id = $ticket->id") ;
//dd($fechav);
        $data = array(
            'fechav'=>$fechav[0]->fecha,
            'unidadN'=> $company->name,
            'ceco'=> $ceco->number,
            'area'=> $asset->location,
            'caso'=>$caso,
            'admin'=> $admin,
            'equipo'=>$asset->number,
            'modelo'=>$asset->model,
            'serial'=>$asset->serial,
            'so'=>$software->name,
            'diagnostico'=>$ticket->description,
            'proceso'=>$est1,
            'pendiente'=>$est2,
            'culminada'=>$est3,
            'conformidad'=>$ticket->according,
            'usuario'=>$usuario,
            'localizacion'=>$zona,
            'preve'=>$type_preve,
            'correc'=>$type_correc,
            'observacion'=>$ticket->according_reason,
            'compania'=>$ceco->company_id,
            
        );
        
        $view= \View::make('admin.pdf.ticket_pdf',compact('data','solus'))->render();
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
      //  $pdf = \PDF::loadView('admin.pdf.ticket_pdf');
        return $pdf->stream('informe');
    }

    public function informe(Request $request, $id){
      //  dd($id);


        $plan= modeloPlanning::findorfail($id);
        $anno=substr($plan->planning_at, 6, 4);
        $company = $plan->company_id;
        $fecha=date ( 'd-m-Y' , strtotime ( $plan->planned_at) );
        //$admin_id=$tecnico[0]->admin_id;
        $admin_t = modeloUser::findOrFail($plan->admin_id);
        $admin= $admin_t->first_name.' '.$admin_t->last_name;
        $mpp= DB::select("SELECT count(*) as mpp from assets LEFT JOIN  planning_assets on assets.id= planning_assets.asset_id where planning_id= $id and deleted_at is NULL and is_active=1");
        $mpr = DB::select("select count(*) as mpr from tickets where plan_id =$id and solved_at is not NULL");
        $mpnor = DB::select( " select count(*) as mpnor from tickets where plan_id=$id and solved_at is NULL ");
        $cmc= DB::select("select count(*) as cmc from tickets where plan_id=$id and according = 1");
        $cmnoc= DB::select("select count(*) as cmnoc from tickets where plan_id = $id and according = 2");
      //  dd($mpp[0]->mpp,$mpnor[0]->mpnor);
       if(empty($mpr[0]->mpr)){
            Session::flash('warning','No se han realizado las actividades de mantenimientos');
            return back();
        }
        $calculo= intval(($mpr[0]->mpr/$mpp[0]->mpp)*100);
        $conforme= intval(($cmc[0]->cmc/$mpr[0]->mpr)*100);
       // var $indicador=0;
        if (($calculo > 90) or ($calculo== 90)){
            $indicador='ESTABLE';
        }else{
            if (($calculo < 90) or ($calculo > 60)){
                $indicador='FUERA DE CONTROL';
            }else{
                if($calculo < 60){
                    $indicador='CRÍTICO';
                }
            }
        }
        if (($conforme > 90) or ($conforme== 90)){
            $indicador2='ESTABLE';
        }else{
            if (($conforme< 90) or ($conforme > 60)){
                $indicador2='FUERA DE CONTROL';
            }else{
                if($conforme < 60){
                    $indicador2='CRÍTICO';
                }
            }
        }
        $data = array(
            'fechav'=>$fecha,
            'mpp'=> $mpp[0]->mpp,
            'mpr'=>  $mpr[0]->mpr,
            'mpnor'=>$mpnor[0]->mpnor,
            'calculo'=>$calculo,
            'indicador'=> $indicador,
            'cmc'=>$cmc[0]->cmc,
            'cmnoc'=>$cmnoc[0]->cmnoc,
            'conforme'=>$conforme,
            'indicador2'=> $indicador2,
            'admin'=>$admin,
            'anno'=>$anno,
        );

        $view= \View::make('admin.pdf.informe_pdf',compact('data'))->render();
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //  $pdf = \PDF::loadView('admin.pdf.ticket_pdf');
        return $pdf->stream('informe');
    }



    public function getActivos($id)
    {
        
        $asset=modeloAsset::findOrFail($id);
        $ceco=modeloCeco::find($asset->ceco_id);
        $company=modeloCompany::find($asset->company_id);
        $asset_type=modeloAsset_type::find($asset->assets_type_id);
        $software=modeloSoftware::find($asset->software_id);
        $brand=modeloBrand::find($asset->brand_id);
        $user= modeloUser::findorfail($asset->user_id);
        $supplier=modeloSupplier::findorfail($asset->supplier_id);
        // $asset_detail=modeloAsset_detail::where('asset_id',$asset->id)->get();
        // If (empty($asset_detail[0])){
        //     $placa="N/A";
        //     $processor="N/A";
        //     $hdd="N/A";
        //     $cddvd="N/A";
        //     $ram="N/A";
        //     $floppy="N/A";
        // }else{
        //     $placa= $asset_detail[0]->motherboard;
        //     $processor= $asset_detail[0]->processor;
        //     $hdd= $asset_detail[0]->HDD;
        //     $cddvd= $asset_detail[0]->CDDVD;
        //     $ram=$asset_detail[0]->RAM;
        //     $floppy=$asset_detail[0]->floppy;
        // }
        $instalador= modeloUser::findorfail($asset->installed);;
        $supervisor= modeloUser::findorfail($asset->supervised);;

        switch($asset->condition){
            case'1':
                $condition= "NUEVO";
                break;
            case'2':
                $condition= "USADO";
                break;
            case'3':
                $condition= "REPOTENCIADO";
                break;
            case'4':
                $condition= "DESINCORPORADO";
                break;
        }
        $department= modeloDepartment::where('ceco_id',$asset->ceco_id)->get();
        $ubicacion='ff';
        if ($asset->warranty_end==NULL){
            $fecha_fing = "N/A";
        }else {
            $fecha_fing = date ( 'd-m-Y' , strtotime ( $asset->warranty_end) );
        }
        
        if ($asset->instalation_at==NULL){
            $fechainstal = "N/A";
        }else {
            $fechainstal = date ( 'd-m-Y' , strtotime ( $asset->instalation_at) );
        }
        
        if ($asset->operation_at==NULL){
            $fechaoper = "N/A";
        }else {
            $fechaoper = date ( 'd-m-Y' , strtotime ( $asset->operation_at) );
        }


        // $assetHasPeripheral = modeloAssets_has_peripheral::where('assets_id','=' ,$id)->get();
        // $tmarca = "N/A";
        // $tmodelo = "N/A";
        // $tserial = "N/A";

        // $mmarca = "N/A";
        // $mmodelo = "N/A";
        // $mserial = "N/A";

        // $rmarca = "N/A";
        // $rmodelo = "N/A";
        // $rserial = "N/A";

        // $omarca = "N/A";
        // $omodelo = "N/A";
        // $oserial = "N/A";

        // for ($x = 0; $x < count($assetHasPeripheral); $x++){ 
        //     $peri = modeloPeripheral::where('id','=' ,$assetHasPeripheral[$x]->peripheral_id)->get();
        //     if($peri[0]->type == "TECLADO"){
        //         $marcas= modeloBrand::where('id','=' ,$peri[0]->brands_id)->get();
        //         $tmarca = $marcas[0]->name;
        //         $tmodelo = $peri[0]->model;
        //         $tserial = $peri[0]->serial;
        //     }
        //     if($peri[0]->type == "MOUSE"){
        //         $marcas= modeloBrand::where('id','=' ,$peri[0]->brands_id)->get();
        //         $mmarca = $marcas[0]->name;
        //         $mmodelo = $peri[0]->model;
        //         $mserial = $peri[0]->serial;
        //     }
        //     if($peri[0]->type == "REG/UPS"){
        //         $marcas= modeloBrand::where('id','=' ,$peri[0]->brands_id)->get();
        //         $rmarca = $marcas[0]->name;
        //         $rmodelo = $peri[0]->model;
        //         $rserial = $peri[0]->serial;
        //     }
        //     if($peri[0]->type == "OTRO"){
        //         $marcas= modeloBrand::where('id','=' ,$peri[0]->brands_id)->get();
        //         $omarca = $marcas[0]->name;
        //         $omodelo = $peri[0]->model;
        //         $oserial = $peri[0]->serial;
        //     }
        // }
        if (modeloBrand::find($asset->tbrands_id)==NULL){
            $tbrands_id = "N/A";
        }else {
            $tbrands_id = modeloBrand::find($asset->tbrands_id)->name;
            
        }

        if (modeloBrand::find($asset->tbrands_id)==NULL){
            $mbrands_id = "N/A";
        }else {
            $mbrands_id = modeloBrand::find($asset->mbrands_id)->name;
        }

        if (modeloBrand::find($asset->tbrands_id)==NULL){
            $rbrands_id = "N/A";
        }else {
            $rbrands_id = modeloBrand::find($asset->rbrands_id)->name;
        }
        
        if (modeloBrand::find($asset->tbrands_id)==NULL){
            $obrands_id = "N/A";
        }else {
            $obrands_id = modeloBrand::find($asset->obrands_id)->name;
        }


        $data = array(
            'ceco'=>$ceco->number,
            'company'=>$company->name,
            'software'=>$software->name,
            'area'=>$department[0]->name,
            'tipo'=>$asset_type->type,
            'condition'=>$condition,
            'serial'=>$asset->serial,
            'marca'=>$brand->name,
            'ubica'=>$ubicacion,
            'usuario'=>$user->first_name." ".$user->last_name,
            'proveedor'=>$supplier->name,
            'garantia'=>$asset->warranty,
            'fecha_fing'=>$fecha_fing,
            'fecha_com'=>date ( 'd-m-Y' , strtotime ( $asset->bill_at) ),
            // 'placa'=>$placa,
            // 'processor'=>$processor,
            // 'hdd'=>$hdd,
            // 'cddvd'=>$cddvd,
            // 'ram'=>$ram,
            // 'floppy'=>$floppy,
            'instalado'=>$instalador->first_name." ".$instalador->last_name,
            'supervisado'=>$supervisor->first_name." ".$supervisor->last_name,
            'fechainstal'=>$fechainstal,
            'fechaoper'=>$fechaoper,
            'tmarca'=>$tbrands_id,
            'tmodelo'=>$asset->tmodel,
            'tserial'=>$asset->tserial,
            'mmarca'=>$mbrands_id,
            'mmodelo'=>$asset->mmodel,
            'mserial'=>$asset->mserial,
            'rmarca'=>$rbrands_id,
            'rmodelo'=>$asset->rmodel,
            'rserial'=>$asset->rserial,
            'omarca'=>$obrands_id,
            'omodelo'=>$asset->omodel,
            'oserial'=>$asset->oserial,
            'manager'=>$ceco->manager,
        );
       
        $view= \View::make('admin.pdf.asset_pdf', compact('data','asset'))->render();
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //  $pdf = \PDF::loadView('admin.pdf.ticket_pdf');
     
        

        return $pdf->stream('inventario');
       

    }


    public function getHardware(Request $request)
    {

        $fecha_actual= now();
        $actual = date ( 'd-m-Y' , strtotime ( $fecha_actual) );
        $company=modeloCompany::findorfail($request->company_id);
        $cecos = modeloCeco::all();
        $brands=modeloBrand::all();
        $users=modeloUser::all();
        $asset_type=modeloAsset_type::all();
        //$tecnico= modeloSupport_companies::gettecn($request->company_id);
        //$tech= $tecnico[0]->first_name.' '.$tecnico[0]->last_name;
        //dd($company);
        //        if(!empty($cecos)){
        //$activos_o = [];
        //foreach ($cecos as $ceco){
          //      $resul= modeloAsset::where('ceco_id',$ceco->id)
            //        ->get();
             //   if(count($resul)) {
               //     $activos_o[] = $resul;
                //}
           // }
        //}
        $activos= DB::select("select  *  from assets WHERE assets.company_id='$request->company_id'");
        //dd($cecos[0]);
        //  for ($i=0; $i< count($activos_o);$i++){
        //    for($j=0; $j<count($activos_o[$i]);$j++){
        //      $activos[]=$activos_o[$i][$j];
        //   }
       // }

      //  usort($activos, [$this,"sortFunction"]);
         //dd($activos_orden);
        $data = array(
            'fecha'=>$actual,
            'company'=>$company->name,
            //'admin'=>$tech,
        );
        $view= \View::make('admin.pdf.hardware_inf_pdf', compact('data','activos','brands','users','asset_type','cecos'))->render();
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('inventario');
    }
    
    
    
    public function getHardwareEspecifico(Request $request)
    {
        // return $request;
        $fecha_actual= now();
        $actual = date ( 'd-m-Y' , strtotime ( $fecha_actual) );
        $company=modeloCompany::findorfail($request->company_id_esp);
        $cecos=modeloCeco::findorfail($request->ceco_id);
        //$cecos = modeloCeco::all();
        $brands=modeloBrand::all();
        $users=modeloUser::all();
        $departments=modeloDepartment::all();
        $asset_type=modeloAsset_type::all();
        //$tecnico= modeloSupport_companies::gettecn($request->company_id);
        //$tech= $tecnico[0]->first_name.' '.$tecnico[0]->last_name;
        //dd($company);
        //        if(!empty($cecos)){
        //$activos_o = [];
        //foreach ($cecos as $ceco){
          //      $resul= modeloAsset::where('ceco_id',$ceco->id)
            //        ->get();
             //   if(count($resul)) {
               //     $activos_o[] = $resul;
                //}
           // }
        //}

        $activos = modeloAsset::
            where('company_id','=' ,$request->company_id_esp)
            ->where('ceco_id','=' ,$request->ceco_id)->get();
        $area=modeloDepartment::findorfail($request->department);

        // $activos= DB::select("select  *  from assets WHERE assets.company_id='$request->company_id'");
        //dd($cecos[0]);
        //  for ($i=0; $i< count($activos_o);$i++){
        //    for($j=0; $j<count($activos_o[$i]);$j++){
        //      $activos[]=$activos_o[$i][$j];
        //   }
       // }

      //  usort($activos, [$this,"sortFunction"]);
         //dd($activos_orden);
        $data = array(
            'fecha'=>$actual,
            'company'=>$company->name,
            'ceco'=>$cecos->number,
            'area'=>$area->name
            //'admin'=>$tech,
        );
        $view= \View::make('admin.pdf.hardwareespecifico_inf_pdf', compact('data','activos','brands','users','asset_type','cecos'))->render();
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('inventario');
    }


    public function cronograma($id)
    {
        $plan=modeloPlanning::findorfail($id);
        $tipos=modeloAsset_type::all();
        $tecn=modeloUser::findorfail($plan->admin_id);
        $fecha_actual= now();
        $actual = date ( 'd-m-Y' , strtotime ( $fecha_actual) );
        $fecha_plan= date ( 'd-m-Y' , strtotime ( $plan->planned_at) );
        $assets=DB::select(" SELECT * from assets LEFT JOIN  planning_assets on assets.id= planning_assets.asset_id where planning_id='$plan->id' and deleted_at is NULL ");
        $data = array(
            'fecha'=> $actual,
            'company'=>"fapco",
            'admin'=>$tecn->first_name.' '.$tecn->last_name,
            'fecha_p'=>$fecha_plan,


        );
        $view= \View::make('admin.pdf.cronograma_pdf', compact('data','assets','plan','tipos'))->render();
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //  $pdf = \PDF::loadView('admin.pdf.cronograma_pdf');
        return $pdf->stream('cronograma');
    }
    public function create()
    {
        //
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
