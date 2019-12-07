<?php

Route::group([
    'prefix'        => 'package', 
    'as'            => 'package:'
    ], function() {
    
    $controller = 'PackageController';

    Route::get('{package}/show', 'PackageController@show')->name('show');
});