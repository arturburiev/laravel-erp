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
    return redirect(route('erp.main'));
});

Route::get('/erp/main', 'ErpController@main')->name('erp.main');
Route::get('/erp/list', 'ErpController@list')->name('erp.list');
Route::post('/erp/create', 'ErpController@create')->name('erp.create');
Route::put('/erp/update', 'ErpController@update')->name('erp.update');
Route::delete('/erp/delete', 'ErpController@delete')->name('erp.delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
