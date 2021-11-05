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

Route::group(['prefix'=>'admin'],function(){
    Route::get('team/create','Admin\TeamController@add');
    Route::post('team/create', 'Admin\TeamController@create')->middleware('auth');
    Route::get('team/edit', 'Admin\TeamController@edit');
    Route::post('team/edit', 'Admin\TeamController@update');
    Route::get('team/delete', 'Admin\TeamController@delete');
});

Route::group(['prefix' => 'admin'], function() {
    //Route::get('user/create', 'Admin\UserController@add');
    //Route::post('user/create', 'Admin\UserController@create');
});

Route::get('/register', 'Auth\RegisterController@showRegisterForm');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/login', 'Auth\loginController@showLoginForm');
Route::post('/login', 'Auth\loginController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/team', 'TeamController@index');
Route::get('/user', 'UserController@index');
Route::get('/user', 'UserController@show');
