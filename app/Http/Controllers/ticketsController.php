<?php

namespace Helpdesk\Http\Controllers;

use Carbon\Carbon;
use Helpdesk\Http\Requests\rqst_ticket_create;
use Helpdesk\modeloPlanning;
use Helpdesk\modeloPlanning_asset;
use Helpdesk\modeloSolution;
use Helpdesk\modeloSource;
use Helpdesk\modeloFailure;
use Helpdesk\modeloAsset;
use Helpdesk\modeloTicket_history;
use Helpdesk\modeloticket_solution;
use Helpdesk\modeloUser;
use Helpdesk\modeloticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use PhpParser\Node\Expr\New_;
use Redirect;
use Session;
use Mail;
use DB;

class ticketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets= modeloticket::All();
        //$tickets= $ticket->sortByDesc('id');
        //dd($tickets);
        $assets = modeloAsset::All();
        $users = modeloUser::All();
        $sources = modeloSource::All();
        $failures = modeloFailure::All();

        return view('admin.soporte.cau.tableTicked',compact('tickets','users','sources','assets','failures'));
        //
    }


    public function showAccording($id,$key)
    {
        $ticket= modeloticket::findOrFail($id);
        //dd($ticket->according);
        if (($ticket->according==1)or($ticket->according==2)){
            return view('according.menaccor');
        }
        else{
            if ($ticket->according==3){
                return view('according.according',compact('id'));
            }

        }


    }
    public function getAccording(Request $request)
    {

        $ticket = modeloticket::findOrFail($request->id);
        $admin = modeloUser::findOrFail($ticket->admin_id);
        $user = modeloUser::findOrFail($ticket->user_id);
        $asset= modeloAsset::findOrFail($ticket->asset_id);
        $fullname=$admin->first_name." ".$admin->last_name;


        $data = array(
            'admin'=> $fullname,
            'id'=> $ticket->id,
            'asset2'=> $asset->model,
            'user'=> $user = $user->email,
        );

        // dd($ticket);
        if (Input::get('according')) {
            $according=1;
            $ticket->status='CLOSED';
        } else {
            $data = array_add($data, 'a_reason', $request->according_reason);
            $according=2;
            $ticket->status='PENDING';
            Mail::send('email.no_according', $data, function($message) {
                $message->from('webmaster.fapco@gmail.com','Soporte técnico 💻 - Fapco');
                $message->to('marines782@gmail.com')->subject('Cambio de estado del ticket de soporte');
            });
        }

        $ticket->according = $according;
        $ticket->according_reason = mb_strtoupper($request->according_reason, 'UTF-8');
        $ticket->save();

        return view('according.menaccording');
    }


    public function getticketplanning($id)
    {
        $plan=modeloPlanning::findorfail($id);

        $assets=DB::select(" SELECT * from assets LEFT JOIN  planning_assets on assets.id= planning_assets.asset_id where planning_id='$plan->id' and deleted_at is NULL ");
        if($plan->type ==1){
            $failure=4;
        }else{
            if($plan->type==2){
                $failure=5;
            }
        }
      // dd($assets);
        $description="MANTENIMIENTO PLANIFICADO";
        $priority="HIGH";
        $status="NEW";
        if($assets){
            for ($i=0;$i<count($assets);$i++){
                $key= $this->generateRandomString();
                DB::table('tickets')->insert([
                    ['asset_id' => $assets[$i]->asset_id, 'status' => $status,'failure_id'=>$failure,'description'=>$description,'priority'=> $priority,'source_id'=>1,'user_id'=>$assets[$i]->user_id,'admin_id'=>$plan->admin_id,'key'=>$key,'planning_at'=>$plan->planning_at,'plan_id'=>$plan->id],
                ]);
            }
        }
        $plan->gen_ticket="y";
        $plan->save();
        Session::flash('message','Se han generado los tickets exitosamente');
        return back();
    }

    public function getUser(Request $request, $id){
        if($request->json()){
            $asset = modeloAsset::findOrFail($id);
            $user = modeloUser::findOrFail($asset->user_id);
            $fullname=$user->first_name." ".$user->last_name;
            return response()->json($fullname);
        }
    }
    function generateRandomString($length = 36) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $assets = modeloAsset::All();
        $users = modeloUser::All();
        $sources = modeloSource::All();
        $failures = modeloFailure::All();
        return view('admin.soporte.cau.form_ticket', compact('users','assets','sources','failures'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rqst_ticket_create $request)
    {

        $user = Auth::user()->type;
        $ticket = new modeloticket();
        $ticket->status = 'NEW';
        $ticket->key = $this->generateRandomString();
        $ticket->failure_id= $request->failure_id;
        $ticket->priority= $request->priority;
        $ticket->description = mb_strtoupper($request->description, 'UTF-8');
        $ticket->admin_id= $request->admin_id;
        $ticket->user_id= $request->user_id;
        $ticket->asset_id= $request->asset_id;
        if( $ticket->failure_id== 4){
            $ticket->planning_at= $request->planning_at;
        }
        if ($user=='USER'){

            $ticket->source_id = 2;
            //correo
            $ticket->save();
            $user2 = modeloUser::find($ticket->user_id);
            $asset= modeloAsset::find($ticket->asset_id);
            $fullname=$user2->first_name." ".$user2->last_name;
            //Mail al contacto
            $data = array(
                'name'=> $fullname,
                'id'=> $ticket->user_id,
                'asset2'=> $asset->model,
                'status'=>$ticket->status,
                'admin'=> $user = Auth::user()->email,
            );
            Mail::send('email.email', $data, function($message)use ($user2){
                $message->from('webmaster.fapco@gmail.com','Soporte técnico 💻 - Fapco');
                $message->to($user2->email)->subject('Creación de ticket de soporte  ✔');

            });

            Session::flash('message','El ticket se ha creado exitosamente');
            return Redirect::to('/userhome');
        }
        else{
            $ticket->source_id = 1;
            $ticket->save();
            $user2 = modeloUser::find($ticket->user_id);
            $asset= modeloAsset::find($ticket->asset_id);
            $fullname=$user2->first_name." ".$user2->last_name;
            $data = array(
                'name'=> $fullname,
                'id'=> $ticket->user_id,
                'asset2'=> $asset->model,
                'status'=>'NUEVO',
                'admin'=> $user = Auth::user()->email,
                'key'=>$ticket->key,
                'id_ticket'=> $ticket->id,
            );

            Mail::send('email.email', $data, function($message) use ($user2){
                $message->from('webmaster.fapco@gmail.com','Soporte técnico 💻 - Fapco');
                $message->to($user2->email)->subject('Creación de ticket de soporte  ✔');

            });
            Session::flash('message','El ticket se ha creado exitosamente');
            return Redirect::to('/tickets');
        };


    }

    public function sortFunction( $a, $b ) {
        return strtotime($a["date"]) - strtotime($b["date"]);
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
        $ticket_histories= modeloTicket_history::all();
        $ticket= modeloticket::findOrFail($id);
        $user= modeloUser::find($ticket->user_id);
        $admin= modeloUser::find($ticket->admin_id);
        $asset= modeloAsset::find($ticket->asset_id);
        $failure = modeloFailure::find($ticket->failure_id);
        $source = modeloSource::find($ticket->source_id);
        $fecha_cambio= [];
        if(empty($admin)){
            $tech="SIN ASIGNAR";
        }else{
            $tech=$admin->first_name.''.$admin->last_name;
        }

        if($ticket->created_at){
            $fecha1= array(
                'title'=>'Creación del Ticket',
                'date'=>$ticket->created_at,
                );
            array_push($fecha_cambio,$fecha1);

        }
        if($ticket->assigned_at){
            $fecha2= array(
                'title'=>'Asignación de Ticket al técnico',
                'date'=>$ticket->assigned_at,
                );
           array_push($fecha_cambio,$fecha2);

        }
        if($ticket->blocked_at){
            $fecha3= array(
                'title'=>'El Ticket fue bloqueado',
                'date'=>$ticket->blocked_at,
                );
             array_push($fecha_cambio,$fecha3);

        }
        if($ticket->unblocked_at){
            $fecha4= array(
                'title'=>'Desbloqueo del Ticked',
                'date'=>$ticket->unblocked_at,
                );
            array_push($fecha_cambio,$fecha4);
        }
        if($ticket->solved_at){
            $fecha5= array(
                'title'=>'Solucionado',
                'date'=>$ticket->solved_at,
            );
            array_push($fecha_cambio,$fecha5);
        }

        usort($fecha_cambio, [$this,"sortFunction"]);

        return view('admin.soporte.cau.profile_ticket', ['ticket' =>$ticket ],compact('user','asset','failure','source','tech','ticket_histories','fecha_cambio'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if((Auth::user()->type == 'USER')AND ($ticket->status!== 'SOLVED')){
            return Redirect::to('/userhome');
        }
        $ticket = modeloticket::findorfail($id);
        $assets = modeloAsset::All();
        $users = modeloUser::All();
        $sources = modeloSource::All();
        $failures = modeloFailure::All();
        $solutions=modeloSolution::all();

         return view('admin.soporte.cau.ticket_edit',['ticket'=>$ticket],compact('users','assets','sources','failures','solutions'));
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
//dd($request);
        $ticket = modeloticket::find($id);
        $ticket->fill($request->all());

        switch($ticket->status){
            case'NEW':
                $statust= "NUEVO";
                break;
            case'PENDING':
                $statust= "PENDIENTE";
                break;
            case'ASSIGNED':
                $statust= "ASIGNADO";
                break;
            case'BLOCKED':
                $statust= "BLOQUEADO";
                break;
            case('WORKING'):
                $statust= "EN PROCESO";
                break;
            case('SOLVED'):
                $statust= "SOLUCIONADO";
                break;
        }
        $ticket->save();
        $user2 = modeloUser::find($ticket->user_id);
        $asset= modeloAsset::find($ticket->asset_id);
        $fullname=$user2->first_name." ".$user2->last_name;


        $data = array(
            'name'=> $fullname,
            'id'=> $ticket->id,
            'asset2'=> $asset->model,
            'status'=>$statust,
            'admin'=> $user = Auth::user()->email,
            'reason'=>$ticket->blocked_reason,
            'key'=>$ticket->key,
        );

        if(($ticket->status == 'SOLVED')and (Auth::user()->type == 'USER')) {
            $ticket->save();

            Session::flash('message', 'Su Ticket ha sido Cerrado');
            return Redirect::to('/userhome');
        }

        else {
            if ($ticket->status == 'BLOCKED') {
                Mail::send('email.status_blocked', $data, function ($message) use ($user2) {
                    $message->from('webmaster.fapco@gmail.com', 'Soporte técnico 💻 - Fapco');
                    $message->to($user2->email)->subject('Cambio de estado del ticket de soporte');
                });
            } else {
                if ($ticket->status == 'SOLVED') {

                    if($request['solution_id']){
                            DB::table('ticket_solutions')->insert([
                                ['ticket_id' => $ticket->id, 'solution_id' => $request['solution_id'], 'description'=>$request->detail_solution ],
                            ]);
                    }
                    $solut = modeloticket_solution::getsolutiontick($ticket->id);
                    $solution= $solut[0]->description;
                    $data = array_add($data, 'solution', $solution);
                    //dd($user2->email);
                    Mail::send('email.according_email', $data, function ($message) use ($user2) {
                        $message->from('webmaster.fapco@gmail.com', 'Soporte técnico 💻 - Fapco');
                        $message->to($user2->email)->subject('Cambio de estado del ticket de soporte');

                    });
                }else{

                    Mail::send('email.status_c', $data, function($message) use ($user2){
                        $message->from('webmaster.fapco@gmail.com','Soporte técnico 💻 - Fapco');
                        $message->to($user2->email)->subject('Cambio de estado del ticket de soporte');
                    });
                }
            }
        }


        Session::flash('message','El Ticket se ha actualizado Exitosamente');
        return Redirect::to('/tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function retornar(){
        return Redirect::to('/tickets');
    }

    public function destroy($id)
    {
        //
    }
}
