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



Route::get('/', 'PageController@index');

Route::get('/users', 'PageController@users');
Route::post('/user-add', 'UserController@add');
Route::get('/user-edit/{user}', 'PageController@userEdit');
Route::post('/user-edit', 'UserController@edit');
Route::get('/user-delete/{user}', 'UserController@delete');

Route::get('/departments', 'PageController@departments');
Route::post('/department-add', 'DepartmentController@add');
Route::get('/department-edit/{departments}', 'PageController@departmentEdit');
Route::post('/department-edit', 'DepartmentController@edit');
Route::get('/department-delete/{departments}', 'DepartmentController@delete');

Auth::routes();
