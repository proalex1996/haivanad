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

Route::group(['prefix' => 'contract'], function () {
    Route::get('/postJan', 'ContractController@postJan');
    Route::get('/postJun', 'ContractController@postJun');
    Route::get('/postFeb', 'ContractController@postFeb');
    Route::get('/postDec', 'ContractController@postDec');
    Route::get('/postJul', 'ContractController@postJul');
    Route::get('/postNov', 'ContractController@postNov');
    Route::get('/postSep', 'ContractController@postSep');
    Route::get('/postOct', 'ContractController@postOct');
    Route::get('/postAug', 'ContractController@postAug');
    Route::get('/postMay', 'ContractController@postMay');
    Route::get('/postMar', 'ContractController@postMar');
    Route::get('/postApr', 'ContractController@postApr');

});
Route::group(['prefix' => 'product'], function () {
    Route::post('/pickupBanner/{id}', 'ContractController@pickupBanner');
    Route::get('/apitable', 'ProductController@apiProduct');


});


