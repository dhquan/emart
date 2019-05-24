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
Route::get('get-form',['uses'=> 'TestController@getForm']);
Route::post('handle-form',['uses'=> 'TestController@handleRequest']);
Route::resource('users','UsersController');