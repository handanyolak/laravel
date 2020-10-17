<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\Anasayfa@index')->name('anasayfa');
Route::get('/iletisim', 'App\Http\Controllers\Anasayfa@iletisim');
Route::get('/kurumsal', 'App\Http\Controllers\Anasayfa@kurumsal');
Route::get('/vizyonumuz', 'App\Http\Controllers\Anasayfa@vizyonumuz');

Route::get('/diger', 'App\Http\Controllers\Anasayfa@diger_fonksiyon');
Route::get('diger/getData', 'App\Http\Controllers\DigerController@getData')->name('diger.getdata');
Route::post('diger/update', 'App\Http\Controllers\DigerController@update')->name('diger.update');
Route::post('diger/create', 'App\Http\Controllers\DigerController@create')->name('diger.create');
Route::post('diger/delete', 'App\Http\Controllers\DigerController@delete')->name('diger.delete');


Route::get('/monitor', 'App\Http\Controllers\Anasayfa@monitor_fonksiyon');
Route::get('monitor/getData', 'App\Http\Controllers\MonitorController@getData')->name('monitor.getdata');
Route::post('monitor/update', 'App\Http\Controllers\MonitorController@update')->name('monitor.update');
Route::post('monitor/create', 'App\Http\Controllers\MonitorController@create')->name('monitor.create');
Route::post('monitor/delete', 'App\Http\Controllers\MonitorController@delete')->name('monitor.delete');


Route::get('/monitor_yeni', 'App\Http\Controllers\Anasayfa@monitor_yeni_fonksiyon');
Route::get('monitor_yeni/getData', 'App\Http\Controllers\MonitorYeniController@getData')->name('monitoryeni.getdata');
Route::post('monitor_yeni/update', 'App\Http\Controllers\MonitorYeniController@update')->name('monitoryeni.update');
Route::post('monitor_yeni/create', 'App\Http\Controllers\MonitorYeniController@create')->name('monitoryeni.create');
Route::post('monitor_yeni/delete', 'App\Http\Controllers\MonitorYeniController@delete')->name('monitoryeni.delete');


Route::get('/kasa', 'App\Http\Controllers\Anasayfa@kasa_fonksiyon');
Route::get('kasa/getData', 'App\Http\Controllers\KasaController@getData')->name('kasa.getdata');
Route::post('kasa/update', 'App\Http\Controllers\KasaController@update')->name('kasa.update');
Route::post('kasa/create', 'App\Http\Controllers\KasaController@create')->name('kasa.create');
Route::post('kasa/delete', 'App\Http\Controllers\KasaController@delete')->name('kasa.delete');


Route::get('/hurda', 'App\Http\Controllers\Anasayfa@hurda_fonksiyon');
Route::get('hurda/getData', 'App\Http\Controllers\HurdaController@getData')->name('hurda.getdata');
Route::post('hurda/update', 'App\Http\Controllers\HurdaController@update')->name('hurda.update');
Route::post('hurda/create', 'App\Http\Controllers\HurdaController@create')->name('hurda.create');
Route::post('hurda/delete', 'App\Http\Controllers\HurdaController@delete')->name('hurda.delete');


Route::get('/notebook', 'App\Http\Controllers\Anasayfa@notebook_fonksiyon');
Route::get('notebook/getData', 'App\Http\Controllers\NotebookController@getData')->name('notebook.getdata');
Route::post('notebook/update', 'App\Http\Controllers\NotebookController@update')->name('notebook.update');
Route::post('notebook/create', 'App\Http\Controllers\NotebookController@create')->name('notebook.create');
Route::post('notebook/delete', 'App\Http\Controllers\NotebookController@delete')->name('notebook.delete');


Route::get('/thin_istemci', 'App\Http\Controllers\Anasayfa@thin_istemci_fonksiyon');
Route::get('thin_istemci/getData', 'App\Http\Controllers\Thin_IstemciController@getData')->name('thin_istemci.getdata');
Route::post('thin_istemci/update', 'App\Http\Controllers\Thin_IstemciController@update')->name('thin_istemci.update');
Route::post('thin_istemci/create', 'App\Http\Controllers\Thin_IstemciController@create')->name('thin_istemci.create');
Route::post('thin_istemci/delete', 'App\Http\Controllers\Thin_IstemciController@delete')->name('thin_istemci.delete');


Route::get('/yazici_1', 'App\Http\Controllers\Anasayfa@yazici_1_fonksiyon');
Route::get('yazici_1/getData', 'App\Http\Controllers\Yazici_1Controller@getData')->name('yazici_1.getdata');
Route::post('yazici_1/update', 'App\Http\Controllers\Yazici_1Controller@update')->name('yazici_1.update');
Route::post('yazici_1/create', 'App\Http\Controllers\Yazici_1Controller@create')->name('yazici_1.create');
Route::post('yazici_1/delete', 'App\Http\Controllers\Yazici_1Controller@delete')->name('yazici_1.delete');


Route::get('/yazici_2', 'App\Http\Controllers\Anasayfa@yazici_2_fonksiyon');
Route::get('yazici_2/getData', 'App\Http\Controllers\Yazici_2Controller@getData')->name('yazici_2.getdata');
Route::post('yazici_2/update', 'App\Http\Controllers\Yazici_2Controller@update')->name('yazici_2.update');
Route::post('yazici_2/create', 'App\Http\Controllers\Yazici_2Controller@create')->name('yazici_2.create');
Route::post('yazici_2/delete', 'App\Http\Controllers\Yazici_2Controller@delete')->name('yazici_2.delete');
