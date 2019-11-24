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

Route::get('/', function () {
    return view('welcome');
});

// New users must verify their email when registering
Auth::routes(['verify' => true]);

// All users must have had there email verified
Route::middleware(['verified'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('customer', 'CustomerController')->only([
        'show', 'edit', 'update'
    ]);
});
