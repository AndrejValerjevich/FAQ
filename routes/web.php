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

Route::resource('question', 'QuestionController', ['parametrs' => [
    'id' => 'hidden_id'
]]);

Route::resource('theme', 'ThemeController');


/*-----Маршрутизация на home-----*/

Route::get('home', [
    'as' => 'home', 'uses' => 'HomeController@index'
]);

Route::post('AddQuestion', [
    'as' => 'AddQuestion', 'uses' => 'HomeController@AddQuestion'
]);


/*-----Маршрутизация на admin-----*/

Route::get('admin', [
    'as' => 'admin', 'uses' => 'AdminController@index'
]);

Route::post('HideQuestion', [
    'as' => 'HideQuestion', 'uses' => 'AdminController@HideQuestion'
]);

Route::post('DeleteQuestion', [
    'as' => 'DeleteQuestion', 'uses' => 'AdminController@DeleteQuestion'
]);

Route::post('Answer', [
    'as' => 'Answer', 'uses' => 'AdminController@Answer'
]);

Route::post('DeleteTheme', [
    'as' => 'DeleteTheme', 'uses' => 'AdminController@DeleteTheme'
]);


/*-----Маршрутизация на ask-----*/

Route::get('ask', [
    'as' => 'ask', 'uses' => 'AskController@index'
]);


/*-----Маршрутизация на users-----*/

Route::get('users', [
    'as' => 'users', 'uses' => 'UsersController@index'
]);

Route::post('DeleteUser', [
    'as' => 'DeleteUser', 'uses' => 'UsersController@DeleteUser'
]);


/*-----Маршрутизация на edit-----*/

Route::post('ShowEditForm', [
    'as' => 'ShowEditForm', 'uses' => 'EditController@index'
]);

Route::post('EditQuestion', [
    'as' => 'EditQuestion', 'uses' => 'EditController@EditQuestion'
]);


/*-----Маршрутизация на addTheme-----*/

Route::get('AddTheme', [
    'as' => 'AddTheme', 'uses' => 'AddThemeController@index'
]);

Route::post('AddTheme', [
    'as' => 'AddTheme', 'uses' => 'AddThemeController@AddTheme'
]);





