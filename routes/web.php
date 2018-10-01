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

Route::get('/', 'DefaultController@index')->name('homepage');
Route::get('/post/{post}', 'PostController@show')->name('post.show');

Route::get('/employees', 'EmployeesController@index')->name('employees.index');
Route::get('/employees/{employer}', 'EmployeesController@show')->name('employees.show');

Route::get('/search', 'SearchController@index')->name('search.index');
