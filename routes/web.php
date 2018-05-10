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
//中文分词搜索
Route::get('/search',function (){
    //require ( "sphinxapi.php" );
    $cl = new \App\SphinxClient();
    $cl->SetServer ( '127.0.0.1', 9312);
//$cl->SetServer ( '10.6.0.6', 9312);
//$cl->SetServer ( '10.6.0.22', 9312);
//$cl->SetServer ( '10.8.8.2', 9312);
    $cl->SetConnectTimeout ( 10 );
    $cl->SetArrayResult ( true );
// $cl->SetMatchMode ( SPH_MATCH_ANY);
    $cl->SetMatchMode ( SPH_MATCH_EXTENDED2);
    $cl->SetLimits(0, 1000);//返回多少条数据1000数据
    $info = 'x';//关键字
    $res = $cl->Query($info, 'admins');//shopstore_search
    //print_r($cl);
    //print_r($res);
    if($res['total']){
        //查看有
        $datas=collect($res['matches'])->pluck('id')->toArray();
        dd($datas);//in id
    }else{
        //没有
    }
} );
