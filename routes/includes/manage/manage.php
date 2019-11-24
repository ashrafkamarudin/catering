<?php

Route::group([
    'prefix'        => 'manage', 
    'as'            => 'manage:', 
    'namespace' => 'Manage',
    'middleware' => 'auth'

    ], function () {
        
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    // Admin and Staff
	Route::group(['middleware' => ['role:admin|staff']], function() {

        // Manage User
        Route::group(['prefix' => 'customer', 'as' => 'customer:'], function() {
            Route::get('index', 'UserController@customer')->name('index');
        });

        // Manage Package
        Route::group(['prefix' => 'package', 'as' => 'package:'], function() {
            Route::get('index', 'PackageController@index')->name('index');
            Route::get('create', 'PackageController@create')->name('create');
            Route::get('{package}/show', 'PackageController@show')->name('show');
            Route::get('{package}/edit', 'PackageController@edit')->name('edit');

            Route::post('store', 'PackageController@store')->name('store');
            Route::put('{package}/update', 'PackageController@update')->name('update');
            Route::delete('{package}/destroy', 'PackageController@destroy')->name('destroy');
        });

        // Manage Order
        Route::group(['prefix' => 'order', 'as' => 'order:'], function() {
            Route::get('index', 'OrderController@index')->name('index');
            Route::get('{order}/show', 'OrderController@show')->name('show');

            Route::post('{order}/approve', 'OrderController@approve')->name('approve');
            Route::get('{order}/cancel', 'OrderController@cancel')->name('cancel');
        });
    });
    
    // Admin
	Route::group(['middleware' => ['role:admin']], function() {

        // Manage User
        Route::group(['prefix' => 'user', 'as' => 'user:'], function() {
            Route::get('index', 'UserController@index')->name('index');
            Route::get('{user}/show', 'UserController@show')->name('show');
            Route::get('{user}/edit', 'UserController@edit')->name('edit');

            route::put('{user}/update', 'UserController@update')->name('update');
            route::delete('{user}/destroy', 'UserController@destroy')->name('destroy');
        });

        // Manage Role
        Route::group(['prefix' => 'role', 'as' => 'role:'], function() {
            Route::get('index', 'RoleController@index')->name('index');
            Route::get('{role}/show', 'RoleController@show')->name('show');
        });

        // Manage Permission
        Route::group(['prefix' => 'permission', 'as' => 'permission:'], function() {
            Route::get('index', 'PermissionController@index')->name('index');
        });
	});
});