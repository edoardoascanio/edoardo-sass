<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('guest')
    ->namespace('Guest')
    ->name("guest.")
    ->group(function () {
        // Route::get('', "HomeController@home")->name("home");
        Route::get('index', "PostController@index")->name("index");
        Route::get('show/{id}', "PostController@show")->name("show");
    });
