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
    Route::post('reset-password', 'ResetPasswordController@sendMail');
    Route::put('reset-password/{token}', 'ResetPasswordController@reset');

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
    Route::post('/photo/{id_banner}', 'ContractController@getphoto');
    Route::get('/photo', 'ContractController@getphoto');
    Route::post('/ratio/{id_contract}', 'ContractController@getRatio');
    Route::post('/deletepay/{payment_period}', 'ContractController@delete_payment');




});

Route::group(['prefix' => 'product'], function () {
    Route::post('/pickupBanner/{id}', 'ContractController@pickupBanner');
    Route::post('/province/{id}','ProductController@province');
    Route::get('/province/{id}','ProductController@province');
    Route::post('/photo/{id}','ProductController@getPhoto');


});


