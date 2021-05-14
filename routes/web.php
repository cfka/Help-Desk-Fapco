       <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Login_Controller@ShowLoginForm')->middleware('guest');


Route::group(['middleware' => 'auth'], function(){
    Route::resource('home','home_Controller');
    Route::resource('department','departmentsController');
    Route::get('returnd','departmentsController@retornar');
    Route::resource('cecos','cecosController');
    Route::get('returnce','cecosController@retornar');
    Route::resource('users','usersController');
    Route::get('retorn','usersController@retornar');
    Route::resource('company','companyController');
    Route::get('returnc','companyController@retornar');
    Route::resource('userhome','userhomeController');
    Route::resource('assets','assetsController');
    Route::get('aretorn','assetsController@aretornar');
    Route::get('cretorn','consumableController@cretornar');
    Route::resource('supplier','supplierController');
    Route::get('returns','supplierController@retornar');
    Route::resource('services','servicesController');
    Route::get('returnser','servicesController@retornar');
    Route::resource('consumables','consumableController');
    Route::get('returncon','consumableController@retornar');
    Route::resource('tickets','ticketsController');
    Route::get('retornt','ticketsController@retornar');
    Route::resource('planning','planningController');
    Route::get('returnpl','planningController@retornar');
    Route::resource('statistics','statisticController');
    Route::resource('software','softwareController');
    Route::resource('cola','colaController');
    Route::resource('brand','brandController');
    Route::resource('assetsType','assets_typeController');
    Route::resource('reports','generarController');
    Route::resource('peripheral','peripheralController');
    Route::resource('planning_assets','planning_assetsController');
    Route::get('returnp','peripheralController@retornar');
    Route::get('assetuser/{id}','ticketsController@getUser');
    Route::get('assetsplanning/{id}','planningController@getasset');
    Route::get('userasset/{id}','assetsController@getAsset');
    Route::get('model/{id}','assetsController@getModel');
    Route::get('ceco/{id}','assetsController@getCeco');
    Route::get('cecocompany/{id}','assetsController@getCecoCompany');
    Route::get('user_dep/{id}','assetsController@getUser');
    Route::get('blocked/{id}','ticketsController@blocked');
    Route::get('unblocked/{id}','ticketsController@unblocked');
    Route::get('according/{id}','ticketsController@according');
    Route::get('ticketplanning/{id}','ticketsController@getticketplanning');
    Route::get('pdf/{id}','assetsController@getPdf');
    Route::get('consu/{id}','assetsController@getConsu');
    Route::get('companyuser/{id}','usersController@getCompany');
    Route::post('accordingupdate','ticketsController@getAccording');
    Route::get('according/{id}/{key}','ticketsController@showAccording');
    Route::get('statistic','statisticController@getStatistic');

    Route::get('assetUser/{id}','consumableController@getAssetUser');
    Route::get('user/{id}','usersController@getUser');


//ver historico
    Route::get('historyassest/{id}', 'assetsController@assestHistory');
    Route::get('historyconsumable/{id}', 'consumableController@consumableHistory');


    

//reporte de activo
    Route::get('reportassest/{id}', 'colaController@assestReport');
    Route::get('reporttec/{id}', 'colaController@tecReport');
    Route::get('historyreport/{id}', 'colaController@reportHistory');
    // Route::get('reportreturn','assetsController@retunReport');
    // Route::get('reportuser','assetsController@userReport');





//imprimir pdf
    Route::name('print')->get('/activo/{id}', 'generarController@getActivos');
    Route::name('print')->post('/hardware', 'generarController@getHardware');
    Route::name('print')->post('/hardwareespecifico', 'generarController@getHardwareEspecifico');
    Route::name('print')->get('/imprimir/{id}', 'generarController@imprimir');
    Route::name('print')->post('/informe/{id}', 'generarController@informe');
    Route::name('print')->get('/cronograma/{id}', 'generarController@cronograma');

});
Route::resource('login','Login_Controller');
Route::get('logout','Login_Controller@logout');

