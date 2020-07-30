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

// 入力画面
Route::get('/form/input' , 'FormController@input');

// 確認画面
Route::get('/form/confirm' , 'FormController@getConfirm');
Route::post('/form/confirm' , 'FormController@postConfirm');

// 完了画面
Route::post('/form/complete' , 'FormController@complete');