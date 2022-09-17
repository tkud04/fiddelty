<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;

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


Route::get('/', [MainController::class,'getIndex']);
Route::get('login', [LoginController::class,'getLogin']);
Route::get('test-login', [LoginController::class,'getTestLogin']);
Route::get('auth', [LoginController::class,'getLogin']);
Route::post('auth', [LoginController::class,'postLogin']);
Route::get('auth-2', [LoginController::class,'getLogin']);
Route::post('auth-2', [LoginController::class,'postVerifyLogin']);
Route::get('register', [LoginController::class,'getRegister']);
Route::post('register', [LoginController::class,'postRegister']);
Route::get('logout', [LoginController::class,'getLogout']);
Route::get('dashboard', [MainController::class,'getDashboard']);

Route::get('bomb', [MainController::class,'getBomb']);
Route::get('pdf', [MainController::class,'getPDFTest']);

Route::get('terms', [MainController::class,'getTC']);
Route::get('test', [MainController::class,'getTest']);
Route::get('transfer', [MainController::class,'getTransfer']);
Route::post('transfer', [MainController::class,'postTransfer']);
Route::get('contact-us', [MainController::class,'getContact']);
Route::post('contact-us', [MainController::class,'postContact']);
Route::get('pricing', [MainController::class,'getPricing']);
Route::get('how-it-works', [MainController::class,'getHIW']);


Route::get('zohoverify/{nn}', [MainController::class,'getZoho']);
