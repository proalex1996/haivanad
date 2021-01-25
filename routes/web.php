<?php


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
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'HomeController@index');
    });
});


Route::group(['prefix' => 'home'], function () {
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'HomeController@index');
    });
});
Route::group(['prefix' => '/'], function () {
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'HomeController@index');
    });
});

Route::get('/menu', [MenuController::class, 'index']);
Auth::routes();


Route::group(['prefix'=>'/chat'], function(){
    Route::group(['middleware'=>'auth'],function (){
        Route::get('/chat','MessageController@getMessage');
    });
    });
Route::group(['prefix'=>'/getUser'], function(){
    Route::group(['middleware'=>'auth'],function (){
        Route::get('/chat','MessageController@getUser');
    });
});
Route::group(['prefix'=>'/message'], function(){
    Route::group(['middleware'=>'auth'],function (){
        return App\Model\Message::with('message_staff')->get();
    });
});
Route::post('/message', function() {
    $staff = Auth::user();
    $message = new App\Model\Message();
    $message->message_content = request()->get('message', '');
    $message->id_staff = $staff->id_message;
    $message->save();

    return ['message' => $message->load('staff')];
})->middleware('auth');


