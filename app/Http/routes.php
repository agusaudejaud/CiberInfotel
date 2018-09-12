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

Route::get('/home', 'HomeController@index');

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

});