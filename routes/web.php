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
Route::get('/', function () {
    
    return view('auth.login');
    
});



Auth::routes();

Route::resource('clientes','ClientesController');
Route::resource('motores','MotoresController');
Route::resource('empleados','UsuariosController');
Route::get('/dashboard', 'DashboardController@index');
Route::post('findLike','ClientesController@findLike');
Route::get('/motores/cliente/{id_cliente}', 'MotoresController@verCliente');
Route::get('motores/{id_cliente}/create', 'MotoresController@create');
Route::get('search', 'MotoresController@search');
Route::post('searchAdvance', 'MotoresController@searchAdvance');
Route::post('searchPower', 'MotoresController@searchPower');

Route::get('/motores/ped/{id}', 'MotoresController@ped');
Route::post('saveFotos', 'MotoresController@saveFotos');
Route::post('saveDocumentos', 'MotoresController@saveDocumentos');
Route::get('eliminarDocumento/{id_documento}', 'MotoresController@eliminarDocumento');
Route::get('/motores/pdfDiagnostico/{id}', 'DiagnosticosController@pdfDiagnostico');
Route::resource('files','MotoresController');
Route::post('changePhoto','UsuariosController@changePhoto');
Route::get('/editMyProfile', 'UsuariosController@editMyProfile');
Route::get('/sendmail', 'UsuariosController@sendmail');
Route::get('/myprofile', 'UsuariosController@profile');
Route::get('/asignar/{id_motor}', 'MotoresController@asignarForm');
Route::post('saveAsignacion', 'MotoresController@saveAsignacion');
Route::get('/diagnostico/{id_motor}', 'DiagnosticosController@diagnostico');
Route::post('saveDiagnostico1', 'DiagnosticosController@saveDiagnostico1');
Route::post('saveDiagnostico2', 'DiagnosticosController@saveDiagnostico2');
Route::post('saveDiagnostico3', 'DiagnosticosController@saveDiagnostico3');
Route::post('saveDiagnostico4', 'DiagnosticosController@saveDiagnostico4');
Route::post('saveDiagnostico5', 'DiagnosticosController@saveDiagnostico5');
Route::post('addFoto', 'MotoresController@addFoto');
Route::post('addWork', 'MotoresController@addWork');
Route::get('/reporte/{id_motor}', 'ReportesController@startReport');
Route::post('saveReporte1', 'ReportesController@saveReporte1');
Route::post('saveReporte2', 'ReportesController@saveReporte2');
Route::post('saveReporte3', 'ReportesController@saveReporte3');


Route::post('saveDiagnosticoTry', 'MotoresController@try');

/* Rutas Materiales */
Route::resource('/materiales','MaterialesController');
Route::get('/materiales/compra/{id_material}','MaterialesController@compra');
Route::post('compra_insert', 'MaterialesController@compra_insert');
Route::get('/look_material/{material}','MaterialesController@look');
Route::post('savePedido', 'MaterialesController@pedido');
Route::get('/getPedido/{id_motor}','MaterialesController@getPedido');
Route::get('/materialespdf/{id_motor}','MaterialesController@materialesPDF');
/* Fin Rutas Materiales */

/* Rutas Motores */
Route::get('/motores/pdf/{id}', 'MotoresController@pdf');
Route::get('/motores/densidadespdf/{id}', 'MotoresController@densidadespdf');
Route::get('/motores/cambiarEstado/{id}', 'MotoresController@cambioEstadoForm');
Route::post('saveEstado', 'MotoresController@saveEstado');
/* Fin Rutas Motores */

/* Rutas Bitacoras */
Route::get('/bitacoras/add/{id}/{coment}', 'BitacorasController@addComent');
/* Fin Rutas bitacoras */

/* Ruutas Warroom */
Route::get('/warroom/viewMotors/{id_tecnico}', 'WarRoomController@viewMotors');
/* fin Rutas War Room */

Route::get('/pdf',function (){
   // $pdf = App::make('dompdf.wrapper');
   // $pdf->loadHTML('<h1>Test</h1>');
    //return $pdf->stream();
   // $pdf = PDF::loadView('pdf.test');
   // return $pdf->download('invoice.pdf');
   $pdf = App::make('snappy.pdf.wrapper');
   $pdf->loadHTML('<h1>Test</h1>');
   return $pdf->inline();
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//ajax 
Route::get('/clienteSelect/{id_cliente}','ClientesController@getDataClient');
Route::get('/contactoSelect/{id}','ClientesController@getDataContact');
Route::get('/motoresphoto/{id_photo}/{id_cliente}', 'MotoresController@deleteFoto');
Route::get('/activateuser/{id}', 'UsuariosController@activateUser');
Route::get('/saveProgress/{id}/{progress}', 'MotoresController@moveProgress');
Route::get('/bearingInfo/{id}','MotoresController@bearingInfo');
Route::get('/deleteCojinete/{id}','MotoresController@deleteCojinete');
Route::get('/getSummaryDiagnostico/{id}','DiagnosticosController@summaryDiagnostico');
Route::get('/setAsignacion/{id_motor}/{id_user}/{asignacion}','MotoresController@asignacion');
Route::get('/getAsignacion/{id_motor}','MotoresController@getAsignacion');
Route::get('/photoPreview/{id_motor}', 'MotoresController@showPhotoPreview');

