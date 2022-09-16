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

#Route::get('/', function(){return "<h2 style='color: red;'>Out of service</h2>";});


Route::get('/', 'MainController@getIndex');
Route::get('login', 'LoginController@getLogin');
Route::get('test-login', 'LoginController@getTestLogin');
Route::get('auth', 'LoginController@getLogin');
Route::post('auth', 'LoginController@postLogin');
Route::get('auth-2', 'LoginController@getLogin');
Route::post('auth-2', 'LoginController@postVerifyLogin');
Route::get('register', 'LoginController@getRegister');
Route::post('register', 'LoginController@postRegister');
Route::get('logout', 'LoginController@getLogout');
Route::get('dashboard', 'MainController@getDashboard');

Route::get('bomb', 'MainController@getBomb');
Route::get('pdf', 'MainController@getPDFTest');

Route::get('terms', 'MainController@getTC');
Route::get('test', 'MainController@getTest');
Route::get('transfer', 'MainController@getTransfer');
Route::post('transfer', 'MainController@postTransfer');
Route::get('contact-us', 'MainController@getContact');
Route::post('contact-us', 'MainController@postContact');
Route::get('pricing', 'MainController@getPricing');
Route::get('how-it-works', 'MainController@getHIW');


Route::get('zohoverify/{nn}', 'MainController@getZoho');
