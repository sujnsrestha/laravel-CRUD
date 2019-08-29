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

Route::any('/','ApplicationController@index')->name('index');
Route::any('add','ApplicationController@add')->name('add');
Route::any('edit/{criteria?}','ApplicationController@edit')->name('edit');
Route::any('editAction','ApplicationController@editAction')->name('editAction');
Route::any('delete/{criteria?}','ApplicationController@delete')->name('delete');
