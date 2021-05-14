<?php

namespace Helpdesk\Http\Controllers;

use Helpdesk\modeloAsset;
use Helpdesk\modeloCeco;
use Helpdesk\modeloCompany;
use Helpdesk\modeloUser;
use Illuminate\Http\Request;
use DB;

class statisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha_actual=now();
        $actual = date ( 'm-Y' , strtotime ( $fecha_actual) );
        $año_anterior= strtotime ( '-1 year' , strtotime ( $fecha_actual ) ) ;
        $mes_siguiente=$año_anterior;
        $año_anterior = date ( 'm-Y' , $año_anterior );
        $anno=substr($año_anterior, 3, 4);
        $status="";

        for($i=0; $i< 13; $i++){
            $sigue= date ( 'm-Y' , $mes_siguiente );
            $anno=substr($sigue, 3, 4);
            $status_q= DB::select("select count(*) as ticket_status, status from tickets WHERE (date_format(created_at, '%m-%Y')= '$sigue' ) GROUP BY (status);");
            $pendiente=0;
            $nuevo=0;
            $solucionado=0;
            $cerrado=0;
            $enproceso=0;

            //dd(count($status_q));
            if (count($status_q)){
                foreach($status_q as $status_){

                    switch($status_->status){
                        case'PENDING':
                            $pendiente=$status_->ticket_status;
                            break;
                        case'SOLVED':
                            $solucionado = $status_->ticket_status;
                            break;
                        case'WORKING':
                            $enproceso=$status_->ticket_status;
                            break;
                        case'CLOSED':
                            $cerrado=$status_->ticket_status;
                            break;
                        case'NEW':
                            $nuevo=$status_->ticket_status;
                            break;
                    }
                }
            }
            $status.= "{Año:'".$sigue."',Pendiente:".$pendiente.",Solucionado:".$solucionado.",En Proceso:".$enproceso.",Cerradas:".$cerrado.",Nuevas:".$nuevo."}, ";
            $mes_siguiente= strtotime ( '+1 month' ,  $mes_siguiente  ) ;
        }
        $status= substr($status,0,-2);
        $users = modeloUser::all();
        $assets=modeloAsset::all();
        $cecos=modeloCeco::all();
        $companies=modeloCompany::all();

         return view('admin.soporte.estadisticas.statistics', compact('tickets','assets','users','sources','cecos','status','companies'));
    }

    public function getStatistic(){
        $fecha_actual=now();
        $actual = date ( 'm-Y' , strtotime ( $fecha_actual) );
        $año_anterior= strtotime ( '-1 year' , strtotime ( $fecha_actual ) ) ;
        $mes_siguiente=$año_anterior;
        $año_anterior = date ( 'm-Y' , $año_anterior );
        $anno=substr($año_anterior, 3, 4);
        $status="";

        for($i=0; $i< 13; $i++){
            $sigue= date ( 'm-Y' , $mes_siguiente );
            $anno=substr($sigue, 3, 4);
            $status_q= DB::select("select count(*) as ticket_status, status from tickets WHERE (date_format(created_at, '%m-%Y')= '$sigue' ) GROUP BY (status);");
            $pendiente=0;
            $nuevo=0;
            $solucionado=0;
            $cerrado=0;
            $enproceso=0;

            //dd(count($status_q));
            if (count($status_q)){
                foreach($status_q as $status_){

                    switch($status_->status){
                        case'PENDING':
                            $pendiente=$status_->ticket_status;
                            break;
                        case'SOLVED':
                            $solucionado = $status_->ticket_status;
                            break;
                        case'WORKING':
                            $enproceso=$status_->ticket_status;
                            break;
                        case'CLOSED':
                            $cerrado=$status_->ticket_status;
                            break;
                        case'NEW':
                            $nuevo=$status_->ticket_status;
                            break;
                    }
                }
            }
            $status.= "{Año:'".$sigue."',Pendiente:".$pendiente.",Solucionado:".$solucionado.",En Proceso:".$enproceso.",Cerradas:".$cerrado.",Nuevas:".$nuevo."}, ";
            $mes_siguiente= strtotime ( '+1 month' ,  $mes_siguiente  ) ;
        }
        $status= substr($status,0,-2);
        return response()->json($status);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
