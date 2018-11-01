<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::auth();



//Route::resource('/articulos', 'ArticuloController');

//Route::resource('/proveedores', 'ProveedorController');



/*Route::get('articulos', [
    'middleware' => 'auth',
    'uses' => 'ArticuloController@index'
]);
*/

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/articulos', 'ArticuloController');
    Route::resource('/proveedores', 'ProveedorController');
    Route::post('/marcasArt', 'ArticuloController@storeMarca');
    Route::resource('/pedidos', 'PedidoController');
    Route::resource('/detallesped', 'DetallepedController');
    Route::get('detallesped/crearPedido/{id}', 'DetallepedController@crearPedido')->name('detallesped.crearPedido');
    Route::get('pdfart', 'ArticuloController@crearPdf');
});

/*Route::get('pdf', function (){
   
    $pdf =PDF::loadView('pdf');
    return $pdf->download('archivo.pdf');
});*/


Route::auth();


