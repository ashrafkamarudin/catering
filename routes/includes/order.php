<?php

Route::group([
    'prefix'        => 'order', 
    'as'            => 'order:', 
    'middleware'    => [
                        'CanUseCart'
                    ]
    ], function() {
    
    $controller = 'OrderController';

    Route::get('/', $controller . '@index')->name('list');
    
    Route::post('{package}/add', $controller . '@store')->name('add');
    Route::post('checkout', $controller . '@checkout')->name('checkout');
    Route::get('clear', $controller . '@clear')->name('clear');
    Route::get('customer/{id}', $controller . '@customer')->name('customer');
});