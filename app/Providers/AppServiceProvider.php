<?php

namespace App\Providers;

use App\Contracts\PaymentContract;
use App\Models\Cart;
use App\Models\StripePayment;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->bind(PaymentContract::class, StripePayment::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\Contracts\PaymentContract', 'App\Models\StripePayment');

        View::composer('layouts.app', function ($view) {
            $view->with(['cart' => new Cart()]);
        });
    }
}
