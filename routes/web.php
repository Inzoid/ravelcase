<?php

//home user
Route::get('/', 'CaseController@index')->name('home');

//dashboard admin
Route::resource('admin', 'AdminController');
Route::get('admin', 'AdminController@index')->name('dashboard');
Route::get('create', 'AdminController@create')->name('create');
Route::post('create', 'AdminController@store')->name('create.case');
Route::get('show', 'AdminController@show')->name('data');
Route::get('edit/{id}', 'AdminController@edit')->name('edit.case');
Route::put('edit/{id}', 'AdminController@update')->name('update.case');
Route::get('user', 'UsersController@index')->name('user');

//crud testimoni
Route::resource('testi', 'TestiController');
Route::get('testimoni', 'TestiController@index')->name('testimoni');
Route::get('create.testi', 'TestiController@create')->name('create.testi');
Route::post('create.testi', 'TestiController@store')->name('create.testimoni');
Route::get('edit.testi/{id}', 'TestiController@edit')->name('edit.testi');
Route::put('edit.testi/{id}', 'TestiController@update')->name('update.testi');

//Auth sentinel
Route::get('signup', 'UsersController@signup')->name('signup');
Route::post('signup', 'UsersController@signup_store')->name('signup.store');
Route::get('login', 'LoginController@login')->name('login');
Route::post('login', 'LoginController@login_store')->name('login.store');
Route::get('logout', 'LoginController@logout')->name('logout');

//crud kategori
Route::resource('kategori', 'CategoryController');
Route::get('kategori', 'CategoryController@index')->name('kategori');
Route::get('create.category', 'CategoryController@create')->name('create.category');
Route::post('create.category', 'CategoryController@store')->name('create.store');
