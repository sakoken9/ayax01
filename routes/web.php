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

//Route::get('/', 'BordController@index');
Route::get('/', 'Bord_headController@index');
Route::get('/sa/entry', 'BordController@entry');
Route::post('/sa/entry', 'BordController@add');

Route::get('/sa/bord/{id}', 'BordController@index');

Route::get('/sa/entry_head', 'Bord_headController@entry');
Route::post('/sa/entry_head', 'Bord_headController@add');


//Auth::routes();
Route::get('/sa/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/sa/login', 'Auth\LoginController@login');
Route::post('/sa/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/sa/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/sa/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('/sa/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/sa/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/sa/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/sa/password/reset', 'Auth\ResetPasswordController@reset');

//Route::get('/home', 'HomeController@index')->name('home');
