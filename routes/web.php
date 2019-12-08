<?php


Route::get('/', 'CaseController@index')->name('home');

Route::resource('admin', 'AdminController');
Route::get('admin', 'AdminController@index')->name('dashboard');
Route::get('create', 'AdminController@create')->name('create');
Route::post('create', 'AdminController@store')->name('create.case');
Route::get('show', 'AdminController@show')->name('data');
Route::get('edit/{id}', 'AdminController@edit')->name('edit.case');
Route::put('edit/{id}', 'AdminController@update')->name('update.case');

Route::resource('testi', 'TestiController');
Route::get('testimoni', 'TestiController@index')->name('testimoni');
Route::get('create.testi', 'TestiController@create')->name('create.testi');
Route::post('create.testi', 'TestiController@store')->name('create.testimoni');
Route::get('edit.testi/{id}', 'TestiController@edit')->name('edit.testi');
Route::put('edit.testi/{id}', 'TestiController@update')->name('update.testi');
