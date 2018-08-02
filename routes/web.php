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

Route::get('/', [
	'as' => 'indexPage',
	'uses'=>'HomeController@index'
]);

Route::get('/env/signup',[
	'as' => 'envSignupPage',
	'uses' => 'EnvController@signup'
]);

Route::get('/env/login' , [
	'as' => 'envLoginPage',
	'uses' => 'EnvController@login'
]);

Route::get('/env/members' , [
	'as' => 'envMembersPage',
	'uses' => 'EnvController@members'
])->middleware('auth.veritas');





Route::post('/env/doLogin' , [
	'as' => 'envDoLogin',
	'uses' => 'EnvController@doLogin'
]);
Route::post('/env/doSignup',[
	'as' => 'envDoSignup',
	'uses' => 'EnvController@doSignup'
]);
Route::post('/env/doUpdateUserPhoto',[
	'as' => 'envDoUpdateUserPhoto',
	'uses' => 'EnvController@doUpdateUserPhoto'
]);

Route::get('/env/doLogout' ,[
	'as' => 'envDoLogout',
	'uses' => function(){
		session()->forget('user-info');
		return redirect()->route('indexPage');
	}
]);

//////////////////////////////////////////////POSTS////////////////////////////////////////////////////


Route::get('/posts/' , [
	'as' => 'postsPage',
	'uses' => 'PostController@posts'
]);

Route::post('/posts/doPost', [
	'as' => 'postsDoPost',
	'uses' => 'PostController@doPost'
]);
