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





// api
Route::get('/api/master', 'FormController@apiMaster');
Route::post('/api/confirm', 'FormController@confirm');


// APIのURL以外のリクエストに対してはindexテンプレートを返す
// 画面遷移はフロントエンドのVueRouterが制御する
Route::get('/{any}', function () {
	return view('form/index');
})->where('any', '.*');

// Route::get('/', function () {
// 	return view('form/index');
// });

// Route::get('/confirm', function () {
// 	return view('form/index');
// });


// // 入力画面
// Route::get('/form/input' , 'FormController@input');

// // 確認画面
// Route::get('/form/confirm' , 'FormController@getConfirm');
// Route::post('/form/confirm' , 'FormController@postConfirm');
// Route::post('/form/confirm' , 'FormController@postConfirm');

// // 完了画面
// Route::post('/form/complete' , 'FormController@complete');