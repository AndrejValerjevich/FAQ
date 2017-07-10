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

Route::resource('question', 'QuestionController', ['except' => [
    'index', 'edit'
]]);

Route::resource('theme', 'ThemeController', ['only' => [
    'create', 'store', 'destroy'
]]);

Route::post('question.answer/{question}', [
    'as' => 'question.answer', 'uses' => 'QuestionController@answer'
])->middleware('auth');

Route::post('question.hide/{question}', [
    'as' => 'question.hide', 'uses' => 'QuestionController@hide'
])->middleware('auth');

Route::post('password.reset', [
    'as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

Route::post('password.request', [
    'as' => 'password.request', 'uses' => 'Auth\ResetPasswordController@resetPassword'
]);


/*-----Маршрутизация на home-----*/

Route::get('home', [
    'as' => 'home', 'uses' => 'HomeController@index'
])->middleware('guest');


/*-----Маршрутизация на admin-----*/

Route::get('admin', [
    'as' => 'admin', 'uses' => 'AdminController@index'
])->middleware('auth');


/*-----Маршрутизация на users-----*/

Route::get('users', [
    'as' => 'users', 'uses' => 'UsersController@index'
])->middleware('auth');

Route::post('user.destroy', [
    'as' => 'user.destroy', 'uses' => 'UsersController@destroy'
])->middleware('auth');








