<?php

// Payment
Route::group([
    'prefix'        => 'payment', 
    'as'            => 'payment:', 
    'middleware'    => [
                        'CanUseCart'
                    ]
    ], function() {
    
    $controller = 'PaymentController';
    // Route::get('checkout', 'PaymentController@makePayment')->name('checkout');

    Route::get('success', $controller . '@displaySuccessPage')->name('success');
    Route::get('cancel', $controller . '@displayFailPage')->name('fail');
    Route::post('cancel', $controller . '@displayFailPage')->name('fail');
});