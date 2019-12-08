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
Route::get('/pay', 'PaymentController@makePayment');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/package', 'Manage\PackageController@all')->name('package:all');

// Manage
require base_path('routes/includes/manage/manage.php');

// Package
require base_path('routes/includes/package.php');

// Order
require base_path('routes/includes/order.php');

// payment
require base_path('routes/includes/payment.php');

// webhook
require base_path('routes/includes/webhook.php');

