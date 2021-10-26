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
    Route::post('team/create', 'Admin\TeamController@create');
    Route::get('team/edit', 'Admin\TeamController@edit');
    Route::post('team/edit', 'Admin\TeamController@update');
    Route::get('team/delete', 'Admin\TeamController@delete');
});

Route::get('/', 'TeamController@index');