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

Route::get('users/register', 'UsersController@register');
Route::post('users/store', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/authenticate', 'UsersController@authenticate');
Route::get('users/logout', 'UsersController@logout')->middleware('auth');

