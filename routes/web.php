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

Route::get('/settings/services', 'ServiceController@index')->name('services.index');
Route::get('/settings/data', 'ServiceController@anyData')->name('services.data');
Route::post('/settings/import', 'ServiceController@importData')->name('service.import');
Route::post('/settings/add', 'ServiceController@store')->name('service.store');

Route::get('/settings/lpu', 'LpuController@index')->name('lpu.index');
Route::get('/settings/lpu/data', 'LpuController@anyData')->name('lpu.data');
Route::post('/settings/lpu/import', 'LpuController@importData')->name('lpu.import');
Route::post('/settings/lpu/add', 'LpuController@store')->name('lpu.store');

Route::get('/settings/smo', 'SmoController@index')->name('smo.index');
Route::get('/settings/smo/data', 'SmoController@anyData')->name('smo.data');
Route::post('/settings/smo/import', 'SmoController@importData')->name('lpu.import');
Route::post('/settings/smo/add', 'SmoController@store')->name('smo.store');

Route::get('/import', 'ImportDataController@index')->name('import.index');
Route::post('/import', 'ImportDataController@upload');

Route::get('/reports/excerpt', 'ReportController@excerpt')->name('reports.excerpt');
Route::post('/reports/excerpt_read', 'ReportController@excerptRead')->name('reports.excerpt.read');