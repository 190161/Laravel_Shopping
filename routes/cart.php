<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'cart',
    'as' => 'cart.',
], function () {
    Route::get('/', 'CartController@index')->name('index');
    Route::get('add/{id}', 'CartController@add')->name('add');
    Route::get('remove/{id}', 'CartController@remove')->name('remove');
    Route::get('clear', 'CartController@clear')->name('clear');
});

Auth::routes();

Route::get('/', 'CartController@index')->name('home');
