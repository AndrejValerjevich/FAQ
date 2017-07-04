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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('admin', 'AdminController@index');

Route::get('ask', 'AskController@index');

Route::get('users', 'UsersController@index');

Route::post('ShowEditForm', [
    'as' => 'ShowEditForm', 'uses' => 'EditController@index'
]);

Route::post('changePassword', 'ChangePasswordController@index');

Route::post('home/AddQuestion', [
    'as' => 'AddQuestion', 'uses' => 'HomeController@AddQuestion'
]);

Route::post('admin/Answer', [
    'as' => 'Answer', 'uses' => 'AdminController@Answer'
]);

Route::post('users/Delete', [
    'as' => 'Delete', 'uses' => 'UsersController@Delete'
]);

Route::post('users/ChangePassword', [
    'as' => 'ChangePassword', 'uses' => 'UsersController@ChangePassword'
]);