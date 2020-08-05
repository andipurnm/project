<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::group(['middleware' => ['auth','admin']], function (){
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/role-register','Admin\DashboardController@registered');
    Route::get('/edit/{id}','Admin\DashboardController@registeredit');
    Route::put('/update/{id}','Admin\DashboardController@registerupdate');
    Route::delete('/delete/{id}','Admin\DashboardController@registerdelete');

    Route::get('/abouts','Admin\AboutusController@index');
    Route::post('/save-aboutus','Admin\AboutusController@store');
    Route::get('/about-us/{id}','Admin\AboutusController@edit');
    Route::put('/aboutus-update/{id}','Admin\AboutusController@update');
    Route::delete('/about-us-delete/{id}','Admin\AboutusController@delete');

    Route::get('/dashboard','Admin\DashboardController@index');
    Route::post('/save-kostan','Admin\DashboardController@tambah');
    Route::get('/dash-edit/{id}','Admin\DashboardController@edit');
    Route::put('/dash-update/{id}','Admin\DashboardController@update');
    Route::delete('/dash-delete/{id}','Admin\DashboardController@delete');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
