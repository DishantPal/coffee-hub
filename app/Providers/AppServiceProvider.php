<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Studio\Totem\Totem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Totem::auth(function($request) {
            // return true / false . For e.g.
            return true;
        });
    }
}
