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

//Client
Route::get('/', 'MainController@index')->name('home');

Route::get('/addClient', 'MainController@add')->name('add');
Route::post('/addClient/add', 'MainController@store');

Route::get('/delete/{user_id}', 'MainController@destroy')->name('destroy');

Route::get('/edit/{user_id}', 'MainController@edit')->name('edit');
Route::post('/edit/{user_id}/update', 'MainController@update');

//Task
Route::get('/addTask', 'MainController@addTask')->name('addTask');
Route::post('/addTask/add', 'MainController@storeTask');

Route::get('/deleteTask/{id}', 'MainController@destroyTask')->name('destroyTask');

Route::get('/editTask/{id}', 'MainController@editTask')->name('editTask');
Route::post('/editTask/{id}/update', 'MainController@updateTask');
