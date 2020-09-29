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

Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','GorestController@index');
Route::get('/show/{id}','GorestController@show');
Route::get('/edit/{id}','GorestController@edit');
Route::post('/update','GorestController@update');
Route::delete('/delete/{id}','GorestController@delete');
Route::get('/create','GorestController@create');
Route::post('/submit','GorestController@submit');
Route::get('/iii','GorestController@iii');