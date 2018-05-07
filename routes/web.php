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
//文件上传
Route::post('/upload', 'UploaderController@upload');
Route::resource('activity','ActivityController');
//订单量商家
Route::get('order', 'AddoderController@index')->name('index');
Route::get('order1', 'AddoderController@sex')->name('sex');
//菜品订单
Route::get('good', 'AddoderController@good')->name('good');
Route::get('goods', 'AddoderController@goods')->name('goods');
//会员
Route::resource('regist','RegistController');
//权限
Route::resource('permission','PermissionController');
//角色
Route::resource('roles','RolesController');
//菜单
Route::resource('menus','MenuController');
//活动表
Route::resource('events','EventController');
//奖品
Route::resource('prize','PrizeController');
//中间表
Route::resource('eventmember','EventmemberController');
//抽奖
Route::get('getone', 'EventController@getone')->name('getone');
//查看中奖人
Route::get('getall', 'EventController@getall')->name('getall');
