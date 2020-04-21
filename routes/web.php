<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::get('/{locale}', function ($locale) {
    App::setLocale($locale);
    Session::put('locale', $locale);
    return view('home');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductsController');
});

Route::group(['prefix' => 'tickets', 'middleware' => ['auth']], function() {
    App::setLocale('fr');
    Route::get('/create', 'TicketController@create')->name('tickets.create');
    Route::post('/store', 'TicketController@store')->name('tickets.store');
    Route::get('/index', 'TicketController@index')->name('tickets.index');
    Route::delete('/destroy/{id}', 'TicketController@destroy')->name('tickets.destroy');
    Route::get('/{id}', 'TicketController@show')->name('tickets.show');
    Route::group(['prefix' => 'activities', 'middleware' => ['auth']], function() {
        Route::post('/store', 'ActivityController@store')->name('activities.store');
        Route::get('/download/{filename}', 'ActivityController@download')->name('activities.download');
    });
    Route::group(['prefix' => 'locations', 'middleware' => ['auth']], function() {
        Route::get('/index', 'locationController@index')->name('locations.index');
        Route::get('/create', 'locationController@create')->name('locations.create');
        Route::post('/store', 'locationController@store')->name('locations.store');
        Route::put('/update/{location}', 'locationController@update')->name('locations.update');
        Route::delete('/destroy/{location}', 'LocationController@destroy')->name('locations.destroy');
        Route::get('/edit/{location}', 'LocationController@edit')->name('locations.edit');
    });
});
