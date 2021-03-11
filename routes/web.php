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
    Route::get('/logout','AuthController@logout');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'HomeController@index');

    });
});


Route::group(['prefix' => 'home'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/user', 'HomeController@user');

    });
});
Route::group(['prefix' => 'contract'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'ContractController@getContract');
        Route::post('/', 'ContractController@getContract');

        Route::get('/add', 'ContractController@addContract');
        Route::get('/update/{id}', 'ContractController@update');
        Route::post('/update/{id}', 'ContractController@update');
        Route::post('/add', 'ContractController@createContract');
        Route::get('/download', 'ContractController@getDownload');
        Route::get('/destroy/{id}', 'ContractController@destroy');
    });
});
Route::group(['prefix' => 'users'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'staffController@getIndex');
        Route::post('/','staffController@getIndex');
        Route::get('/add', 'staffController@createStaff');
        Route::post('/add', 'staffController@addStaff');
        Route::get('/update/{id}', 'staffController@update');
        Route::post('/update/{id}', 'staffController@update');
        Route::get('/download', 'ContractController@getDownload');
        Route::get('/destroy/{id}', 'staffController@destroy');
        Route::get('/quyen1/{id}', 'staffController@quyen1');
        Route::get('/quyen2/{id}', 'staffController@quyen2');
        Route::get('/status1/{id}', 'staffController@status1');
        Route::get('/status2/{id}', 'staffController@status2');
        Route::get('/import-staff', 'staffController@importStaff');
        Route::post('/import-staff', 'staffController@import');
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
        Route::get('/sort/{id}', 'CustomerController@export');

    });

});
Route::group(['prefix' => 'product'], function () {
    Route::group(['middleware'=>'auth'],function (){
        Route::get('/','ProductController@getIndex');
        Route::post('/','ProductController@getIndex');
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
        Route::get('/sort?={id}', 'ProductController@getsortStatus');
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
