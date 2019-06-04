<?php

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

// artisan commands //
Route::get('/clear/cache', function () {
    Artisan::call('cache:clear');
});
Route::get('/clear/route', function () {
    Artisan::call('route:cache');
});
Route::get('/clear/view', function () {
    Artisan::call('view:clear');
});
Route::get('/clear/config', function () {
    Artisan::call('config:cache');
});
Route::get('/migrate', function () {
    Artisan::call('migrate');
});

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/printclient/{id}','PDFController@getPdf');

Auth::routes();
Route::group(['middleware' => ['auth']],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/clients', 'ClientController');
    Route::resource('/operators', 'UserController');
//    Route::group(['middleware' => ['role:Admin','permission:create|edit|update']],function(){
//        Route::resource('/clients', 'ClientController');
//    });
//    Route::group(['middleware' => ['role:User','permission:create|edit|update']],function (){
//        Route::resource('/clients', 'ClientController');
//    });
});

