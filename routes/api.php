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
    Route::post('/product-all/', 'ContractController@getALLProduct');
    Route::get('/photo', 'ContractController@getphoto');
    Route::post('/ratio/{id_contract}', 'ContractController@getRatio');
    Route::post('/deletepay/{id_contract}/{payment_period}', 'ContractController@delete_payment');
    Route::post('/set-due', 'ContractController@setDue');
    Route::post('/close', 'ContractController@close');
    Route::post('/open', 'ContractController@open');
    Route::get('/download', 'ContractController@getDownload');
    Route::post('/show/{id_contract}', 'ContractController@showProduct');
    Route::post('/download', 'ContractController@downloadContent');

});

Route::group(['prefix' => 'product'], function () {
    Route::post('/pickupBanner/{id}', 'ContractController@pickupBanner');
    Route::post('/province/{id}','ProductController@province');
    Route::get('/province/{id}','ProductController@province');
    Route::post('/photo/{id_banner}','ProductController@getPhoto');
    Route::get('/photo/','ProductController@getPhoto');
    Route::get('/find/{id_banner}','ProductController@findProduct');

});

Route::group(['prefix' => 'user'], function (){
    Route::post('/add-status','AuthController@addstatus_product');
    Route::post('/update-status','AuthController@updatestatus_product');
    Route::post('/delete-status','AuthController@deletestatus_product');
    Route::post('/add-type','AuthController@addType_product');
    Route::post('/update-type','AuthController@updateType_product');
    Route::post('/delete-type','AuthController@deleteType_product');
    Route::post('/update-kind','ContractController@updateKind');
    Route::post('/delete-kind','ContractController@deleteKind');
    Route::post('/add-kind', 'ContractController@addKind');
    Route::post('/add-stt-contract', 'ContractController@addSttContract');
    Route::post('/delete-stt-contract', 'ContractController@deleteSttContract');
    Route::post('/update-stt-contract', 'ContractController@updateSttContract');
    Route::post('/add-branch', 'ContractController@addBranch');
    Route::post('/update-branch', 'ContractController@updateBranch');
    Route::post('/delete-branch', 'ContractController@deleteBranch');
    Route::post('/add-nguon','AuthController@add_nguon');
    Route::post('/update-nguon','AuthController@update_nguon');
    Route::post('/delete-nguon','AuthController@delete_nguon');
    Route::post('/add-type-customer','ContractController@addTypeCustomer');
    Route::post('/update-type-customer','ContractController@updateTypeCustomer');
    Route::post('/delete-type-customer','ContractController@deleteTypeCustomer');
    Route::post('/add-position','staffController@addPosition');
    Route::post('/update-position','staffController@updatePosition');
    Route::post('/delete-position','staffController@deletePosition');

});
Route::group(['prefix' => 'payment'], function () {
        Route::post('/get-bill', 'PaymentController@getBill');
        Route::post('/get-detail-bill', 'PaymentController@getDetailBill');
});


