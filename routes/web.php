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

Route::get('/', 'HomeController@home');

Auth::routes();

Route::prefix('guest')
    ->namespace('Guest')
    ->name("guest.")
    ->group(function () {
        Route::get('index', "AccomodationController@index")->name("index");
        Route::get('show', "AccomodationController@show")->name("show");
    });

Route::prefix('logged')
    ->namespace('Logged')
    ->middleware('auth')
    ->name("logged.")
    ->group(function () {
        Route::get('create', "AccomodationController@create")->name("create");
        Route::post('store', "AccomodationController@store")->name("store");
        Route::get('show/{id}', "AccomodationController@show")->name("show");
        Route::get('edit/{id}', "AccomodationController@edit")->name("edit");
        Route::match(["PUT", "PATCH"], "accomodation/{id}/update", "AccomodationController@update")->name("update");
        // Route::delete('show', "AccomodationController@destroy")->name("destroy");

    });
