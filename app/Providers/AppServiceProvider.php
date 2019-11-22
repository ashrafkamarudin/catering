<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\StripeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('StripeService', function ($app) {
            return new StripeService;
        });
    }
}
