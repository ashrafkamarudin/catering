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

Route::get('/', 'HomeController@index');

Route::get('/test', 'CartController@test');
Route::get('/pay', 'PaymentController@makePayment');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/package', 'Manage\PackageController@all')->name('package:all');

// Order
Route::group(['prefix' => 'order', 'as' => 'order:', 'middleware' => ['CanUseCart']], function() {
    Route::get('/', 'OrderController@index')->name('list');

    Route::post('{package}', 'OrderController@store')->name('add');
    Route::get('checkout', 'OrderController@checkout')->name('checkout');
});

// Payment
Route::group(['prefix' => 'payment', 'as' => 'payment:', 'middleware' => ['CanUseCart']], function() {
    // Route::get('checkout', 'PaymentController@makePayment')->name('checkout');

    Route::get('success', 'PaymentController@displaySuccessPage')->name('success');
    Route::get('cancel', 'PaymentController@displayFailPage')->name('fail');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Manage'], function () {
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

// Webhooks
Route::group(['prefix' => 'webhooks', 'as' => 'webhooks:'], function() {
    Route::post('oneTimePaymentWebhook', 'PaymentController@oneTimePaymentWebhook')->name('paymentSuccess');
});