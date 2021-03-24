<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:api')->get('/contract', function (Request $request) {

});

Route::group(['prefix' => 'contract'], function () {
    Route::get('/postJan', 'ContractController@postJan');

    Route::post('/delete', 'ContractController@delete_payment');
    Route::post('/getCustomer/{id}', 'ContractController@ApiCustomer');
    Route::get('/getCustomer', 'ContractController@ApiCustomer');
    Route::post('/getProduct/{id_banner}', 'ContractController@APIProduct');
    Route::get('/getProduct', 'ContractController@APIProduct');
    Route::post('/product/{id_banner}', 'ContractController@getProduct');
    Route::get('/product', 'ContractController@getProduct');




});

Route::group(['prefix' => 'product'], function () {
    Route::post('/pickupBanner/{id}', 'ContractController@pickupBanner');


});


