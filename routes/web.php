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

// Route::get('/', function () {
// 	return view('welcome');
// });

Route::get('/', 'AuthController@login')->name('login')->middleware('guest');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'checkRole:admin,atasan,pengajuan']], function() {
	Route::get('/dasboard', 'DasboardController@index');
	Route::get('/history', 'PersetujuanController@history');
	Route::get('/pdf_persetujuan/{id}', 'PersetujuanController@pdf_persetujuan');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {
	Route::get('/pengajuan', 'PengajuanController@index');
	Route::post('/pengajuan/create', 'PengajuanController@create');
	Route::get('/persetujuan', 'PersetujuanController@index');
	Route::get('/persetujuan/detail/{id}', 'PersetujuanController@detail');
	Route::post('/persetujuan/proses/{id}', 'PersetujuanController@proses');
	Route::get('/persetujuan/delete/{id}', 'PersetujuanController@delete');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,atasan']], function() {
	Route::get('/persetujuan', 'PersetujuanController@index');
	Route::get('/persetujuan/detail/{id}', 'PersetujuanController@detail');
	Route::post('/persetujuan/proses/{id}', 'PersetujuanController@proses');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,pengajuan']], function() {
	Route::get('/pengajuan', 'PengajuanController@index');
	Route::post('/pengajuan/create', 'PengajuanController@create');
});

