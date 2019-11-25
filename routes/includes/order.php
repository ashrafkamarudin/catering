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
    Route::get('checkout', $controller . '@checkout')->name('checkout');
});