<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mb', function () {
    return Redirect::to('mb/index.html',301);
});
Route::get('/layer', function () {
    return Redirect::to('layer-v2.1',301);
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    // 认证路由...
    Route::get('auth/login',['uses'=> 'Auth\AuthController@getLogin','as'=>'auth.login']);
    Route::post('auth/login', ['uses'=>'Auth\AuthController@postLogin','as'=>'auth.login']);
    Route::get('auth/logout', ['uses'=>'Auth\AuthController@logout','as'=>'auth.logout']);
// 注册路由...
    Route::get('auth/register', ['uses'=>'Auth\AuthController@getRegister','as'=>'auth.register']);
    Route::post('auth/register', ['uses'=>'Auth\AuthController@postRegister','as'=>'auth.register']);
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware' => ['web']],function(){
    Route::resource('index','IndexController');
    Route::resource('users','UserController');
    Route::resource('permissions','PermissionController');
    Route::resource('roles','RoleController');
    Route::controller('givePermission','GivePermissionController');
    Route::controller('giveRole','GiveRoleController');
});