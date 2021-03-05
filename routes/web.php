<?php


use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MenuController;

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

//Route::group(['middleware' => 'auth'], function() {
//    Route::get('/', 'HomeController@index');
//});

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', 'AuthController@login');
    Route::post('/postlogin', 'AuthController@postlogin');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'HomeController@index');
    });
});


Route::group(['prefix' => 'home'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'HomeController@index');

    });
});
Route::group(['prefix' => 'contract'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'ContractController@getContract');
        Route::get('/add', 'ContractController@addContract');
        Route::get('/update/{id}', 'ContractController@update');
        Route::post('/update/{id}', 'ContractController@update');
        Route::post('/add', 'ContractController@createContract');
        Route::get('/download', 'ContractController@getDownload');
        Route::get('/destroy/{id}', 'ContractController@destroy');
    });
});
Route::group(['prefix' => 'customer'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'CustomerController@getIndex');
        Route::post('/add', 'CustomerController@createCustomer');
        Route::get('/add', 'CustomerController@addCustomer');
        Route::get('/update/{id}', 'CustomerController@update');
        Route::post('/update/{id}', 'CustomerController@update');
        Route::get('/destroy/{id}', 'CustomerController@destroy');
        Route::get('/import-customer', 'CustomerController@importCustomer');
        Route::post('/import-customer', 'CustomerController@import');
        Route::get('/download-exmple', 'CustomerController@dowloadExample');
        Route::get('/export', 'CustomerController@export');

    });

});
Route::group(['prefix' => 'product'], function () {
    Route::group(['middleware'=>'auth'],function (){
       Route::get('/','ProductController@getIndex');
        Route::post('/add', 'ProductController@createProduct');
        Route::get('/add', 'ProductController@addProduct');
        Route::get('/import-product', 'ProductController@importProduct');
        Route::post('/import-product', 'ProductController@import');
        Route::get('/download-exmple', 'ProductController@dowloadExample');
        Route::get('/export', 'productController@export');
        Route::get('/update/{id}', 'ProductController@update');
        Route::post('/update/{id}', 'ProductController@update');
        Route::get('/destroy/{id}', 'ProductController@destroy');
        Route::get('/pickupBanner1/{id}', 'ProductController@pickupBanner1');
        Route::get('/pickupBanner2/{id}', 'ProductController@pickupBanner2');
        Route::get('/genpptx','ProductController@generateppt');
    });
}
);
Route::group(['prefix' => '/'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'HomeController@index');
    });
});

Route::get('/menu', [MenuController::class, 'index']);
Auth::routes();
