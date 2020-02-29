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

Route::get('/', function () {
    return view('welcome');
});


Route::any('test2','Test\TestController@test2');
//前台
Route::prefix('index')->group(function () {
	Route::get('regist','Index\RegistController@regist');				//注册
	Route::post('regist_do','Index\RegistController@regist_do');
	Route::get('login','Index\LoginController@login');					//登录
	Route::post('login_do','Index\LoginController@login_do');
	Route::get('usercenter','Index\UserCenter@usercenter');				//用户中心
	Route::get('getaccesstoken','Index\UserCenter@getaccesstoken');		//获取access_token
	Route::get('testat','Index\UserCenter@testat')->middleware('access_token');			//测试access是否有效
});