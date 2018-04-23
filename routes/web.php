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

/*Route::get('/', function () {
    return view('welcome');
});*/
//商家管理
Route::resource('buys','Admin\BuysController');
Route::resource('admin','AdminController');
Route::resource('plople','PlopleController');
Route::resource('rember','RemberController');

Route::get('login', 'LoginsController@create')->name('login');
Route::post('login', 'LoginsController@store')->name('login');
Route::delete('logout', 'LoginsController@destroy')->name('logout');
Route::get('/', 'LoginsController@help')->name('help');
Route::get('/password', 'PasswordController@index')->name('check');
Route::post('/password', 'PasswordController@store')->name('update');