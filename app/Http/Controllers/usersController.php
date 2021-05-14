<?php

namespace Helpdesk\Http\Controllers;

//use FontLib\TrueType\Collection;
use Helpdesk\Http\Middleware\RedirectIfAuthenticated;
use Helpdesk\modeloCeco;
use Helpdesk\modeloCompany;
use Helpdesk\modeloSupport_companies;
use Illuminate\Http\Request;
use Helpdesk\modeloUser;
use Helpdesk\modeloDepartment;
use Helpdesk\Http\Requests\rqst_user_create;
use Illuminate\Support\Collection as Collection;




use DB;
use Session;
use Redirect;

class usersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = modeloDepartment::all();
        $companies = modeloCompany::all();
        $users = modeloUser::All();
        return view('admin.usuario.usuarios',compact('users','companies'));

    }


    public function getCompany(Request $request, $id){
        if($request->json()){
            $depart = modeloDepartment::find($id);
            $ceco = modeloCeco::find($depart->ceco_id);
            $company=modeloCompany::find($ceco->company_id);
            return response()->json($company->name);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $departments = modeloDepartment::all();
        $compani= DB::select("select * from companies LEFT JOIN support_companies ON company_id = companies.id WHERE company_id is NULL");
        $companies_dis= Collection::make($compani);
        $companies = modeloCompany::all();
        return view('admin.usuario.form_usuarios', compact('departments','companies','companies_dis'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(rqst_user_create $request)
    {
        //
        //return $request;
       // dd($request);
        $User = new modeloUser($request->all());
        $User->first_name = mb_strtoupper($request->first_name, 'UTF-8');
        $User->last_name = mb_strtoupper($request->last_name, 'UTF-8');
        $User->email = mb_strtoupper($request->email, 'UTF-8');
        $User->position = mb_strtoupper($request->position, 'UTF-8');
        $User->password = bcrypt($request->password);
        $User->priority = $request->priority;
        $User->save();
        $User= modeloUser::all();
        $id= $User->last()->id;
        $type=$User->last()->type;
       if($type === 'ADMIN'){
           if($request['companies']){
               for ($i=0;$i<count($request['companies']);$i++){
                    DB::table('support_companies')->insert([
                        ['admin_id' => $id, 'company_id' => $request['companies'][$i]],
                    ]);
               }
           }
       }
       // modeloUser::create($request->all());

        Session::flash('message','El Usuario se ha Creado Exitosamente');
        return response()->redirectToAction('usersController@edit', $id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= modeloUser::findOrFail($id);
        $department= modeloDepartment::find($user->department_id);
        $ceco= modeloceco::find($department->ceco_id);
        $company = modeloCompany::find($ceco->company_id);
        $companies = modeloCompany::all();
        $tec_comps=modeloSupport_companies::getcompaniestecn($id);

        return view('admin.usuario.profile_usuarios', ['user' =>$user ],compact('companies','tec_comps','department','company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function retornar(){
        return Redirect::to('/users');
    }

    public function edit($id)
    {
        $users = modeloUser::findOrFail($id);
        $companies = modeloCompany::all();
        $departments = modeloDepartment::all();
        $tec_comps=modeloSupport_companies::getcompaniestecn($id);
        return view('admin.usuario.userEdit',['users'=>$users],compact('departments','companies','tec_comps'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
      //  dd($request->all());
        $User = modeloUser::findorfail($id);
      //  $User->fill($request->all());
        $User->first_name = mb_strtoupper($request->first_name, 'UTF-8');
        $User->last_name = mb_strtoupper($request->last_name, 'UTF-8');
        $User->email = mb_strtoupper($request->email, 'UTF-8');
        $User->position = mb_strtoupper($request->position, 'UTF-8');
        $User->company_id = $request->company_id;
        $User->type = $request->type;
        $User->priority = $request->priority;
        if($request->password){
            $User->password = bcrypt($request->password);
        }
        
        $User->save();
        if($User->type == 'ADMIN'){
            $tecn_comps= modeloSupport_companies::getcompaniestecn($id);

            foreach ($tecn_comps as $tecn_comp){
                DB::table('support_companies')->where('id', '=',$tecn_comp->id )->delete();
            }
            if($request['companies']){
                for ($i=0;$i<count($request['companies']);$i++){
                    DB::table('support_companies')->insert([
                        ['admin_id' => $id, 'company_id' => $request['companies'][$i]],
                    ]);
                }
            }
        }

        Session::flash('message','El Usuario se ha Actualizado Exitosamente');
        return response()->redirectToAction('usersController@edit', $id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= modeloUser::findorfail($id);
        if($user->type == 'ADMIN'){
            $tecn_comps= modeloSupport_companies::getcompaniestecn($id);
            foreach ($tecn_comps as $tecn_comp){
                DB::table('support_companies')->where('id', '=',$tecn_comp->id )->delete();
            }
        }
        $user->delete();
        Session::flash('message','El Usuario se ha Eliminado Exitosamente');
        return Redirect::to('/users');

    }


    public function getUser(Request $request, $id){
        if($request->json()){
            $user = modeloUser::userName($id);
            return response()->json($user);
        }
    }
}
