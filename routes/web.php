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


Route::get('/', 'CaseController@index')->name('home');

Route::get('admin', 'AdminController@index')->name('dashboard');
Route::get('create', 'AdminController@create')->name('create');
Route::post('create', 'AdminController@store')->name('create.case');
Route::post('edit', 'AdminController@edit')->name('edit.case');