<?php

Route::group([
    'prefix'        => 'manage', 
    'as'            => 'manage:', 
    'namespace' => 'Manage',
    'middleware' => [
                        'CanUseDashboard',
                        'auth'
                    ]

    ], function () {
        
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    // Admin and Staff
	Route::group(['middleware' => ['role:admin|staff']], function() {

        // User
        Route::group(['prefix' => 'customer', 'as' => 'customer:'], function() {
            Route::get('index', 'UserController@customer')->name('index');
        });

        // Package
        Route::group(['prefix' => 'package', 'as' => 'package:'], function() {
            Route::get('index', 'PackageController@index')->name('index');
            Route::get('create', 'PackageController@create')->name('create');
            Route::get('{package}/show', 'PackageController@show')->name('show');
            Route::get('{package}/edit', 'PackageController@edit')->name('edit');

            Route::post('store', 'PackageController@store')->name('store');
            Route::put('{package}/update', 'PackageController@update')->name('update');
            Route::delete('{package}/destroy', 'PackageController@destroy')->name('destroy');
        });

        // Order
        Route::group(['prefix' => 'order', 'as' => 'order:'], function() {
            Route::get('index', 'OrderController@index')->name('index');
            Route::get('{order}/show', 'OrderController@show')->name('show');
            Route::get('{order}/edit', 'OrderController@show')->name('edit');

            Route::post('{order}/approve', 'OrderController@approve')->name('approve');
            Route::post('{order}/complete', 'OrderController@complete')->name('complete');
            Route::get('{order}/cancel', 'OrderController@cancel')->name('cancel');
        });

        // Sale
        Route::group(['prefix' => 'sale', 'as' => 'sale:'], function() {
            Route::get('index', 'SaleController@index')->name('index');
            Route::get('receipt/{sale}', 'SaleController@receipt')->name('receipt');
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