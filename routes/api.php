<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*--- Rutas de acceso de aplicacion ---*/

Route::post('register','Auth\RegisterController@register');

/* 
    Project : Mercapanda 
    Author : JJ
    Created  : Oct 11-10-1019
    Modified : Oct 11-10-2019 
*/

Route::post('authapp','Auth\LoginController@SigninUserApp');
Route::post('recovery_password','Auth\LoginController@recoveryPass');


Route::get('getCategories','Api\CategoriasController@getCategories');
Route::get('getsubCategories','Api\CategoriasController@getsubCategories');


Route::post('searchProducts','Api\ProductsController@searchProducts');
Route::post('getProductsOffers','Api\ProductsController@getProductsOffers');
Route::get('getSlider','Api\SliderController@getSlider');
Route::post('list_parametros','Api\accountsController@parameters');
Route::post('getCupon','Api\accountsController@getCupon');

Route::post('list_addresses','Api\accountsController@listaddresses');
Route::post('addnew_addresses','Api\accountsController@addnewaddresses');
Route::post('edit_addresses','Api\accountsController@editaddresses');
Route::post('delete_addresses','Api\accountsController@deladdresses');


/*Historial de pedidos*/
Route::post('historialpedidos','Api\accountsController@pedidosHistorial');
Route::post('getProductsbyCategories','Api\ProductsController@getProductsbyCategories');
Route::post('getProductsbysubCategories','Api\ProductsController@getProductsbysubCategories');

Route::post('getProductsbyId','Api\ProductsController@getProductsbyId');
Route::post('finishedOrders','Api\OrdersController@Ordersfinished');

/*Registro Aplicacion Web*/
Route::post('registerUser','Api\accountsController@registerUserAccount');
/* Editar perfil APP */
Route::post('editProfile','Api\accountsController@editProfile');

/*--- Consulta de Paises. Departamentos y Ciudades ---*/
Route::post('listarPaises','Api\accountsController@PaisesLista');
Route::post('listarDptos','Api\accountsController@DptosLista');
Route::post('listarCitys','Api\accountsController@CitysLista');








/*--- Rutas de acceso Global y publica  ---*/
Route::group(['middleware'=>'client.credentials'], function(){
   
});

/*--- Rutas de acceso privada autenticacion por usuario  ---*/
Route::group(['middleware'=>'auth:Api'], function(){
    Route::get('GetUsers','UserController@index');
    
});


