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

Route::post('EditQuestion', [
    'as' => 'EditQuestion', 'uses' => 'EditController@EditQuestion'
]);

Route::get('AddTheme', [
    'as' => 'AddTheme', 'uses' => 'AddThemeController@index'
]);

Route::post('AddTheme', [
    'as' => 'AddTheme', 'uses' => 'AddThemeController@AddTheme'
]);

Route::post('DeleteTheme', [
    'as' => 'DeleteTheme', 'uses' => 'AdminController@DeleteTheme'
]);

Route::post('HideQuestion', [
    'as' => 'HideQuestion', 'uses' => 'AdminController@HideQuestion'
]);

Route::post('DeleteQuestion', [
    'as' => 'DeleteQuestion', 'uses' => 'AdminController@DeleteQuestion'
]);

Route::post('changePassword', 'ChangePasswordController@index');

Route::post('home/AddQuestion', [
    'as' => 'AddQuestion', 'uses' => 'HomeController@AddQuestion'
]);

Route::post('Answer', [
    'as' => 'Answer', 'uses' => 'AdminController@Answer'
]);

Route::post('users/Delete', [
    'as' => 'Delete', 'uses' => 'UsersController@Delete'
]);

Route::post('users/ChangePassword', [
    'as' => 'ChangePassword', 'uses' => 'UsersController@ChangePassword'
]);