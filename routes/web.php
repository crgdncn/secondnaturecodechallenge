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
Auth::routes(['verify' => false]);

// All users must have had there email verified
// Route::middleware(['verified'])->group(function () {
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('customer', 'CustomerController')->only([
        'show', 'edit', 'update'
    ]);

    Route::get('/customer/{customer}/address', 'AddressController@new')->name('customer.address.new');
    Route::get('/customer/{customer}/address/{address}', 'AddressController@edit')->name('customer.address.edit');
    Route::post('/customer/{customer}/address', 'AddressController@save')->name('customer.address.save');
    Route::patch('/customer/{customer}/address/{address}', 'AddressController@update')->name('customer.address.update');
    Route::post('/customer/{customer}/makeadmin', 'CustomerController@makeAdmin')->name('customer.makeadmin');
    Route::post('/customer/{customer}/removeadmin', 'CustomerController@removeAdmin')->name('customer.removeadmin');

    Route::resource('widget', 'WidgetController')->except('show', 'destroy')->middleware('can:manage-widgets');

    Route::get('/widget/list', 'WidgetController@list')->name('widget.list');
    Route::post('/customer/{customer}/addwidget', 'CustomerController@addWidget')->name('customer.addwidget');
    Route::post('/customer/{customer}/removewidget', 'CustomerController@removeWidget')->name('customer.removewidget');
});
