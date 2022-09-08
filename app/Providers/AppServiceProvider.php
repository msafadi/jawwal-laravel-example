<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
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
        // Bind a new value to the service container
        // $this->app : Service Container Object
        $this->app->bind('jawwal', function() {
            return 'Welcome to Jawwal';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Get a value from the service container
        // echo $this->app->make('jawwal');

        Paginator::useBootstrapFive();
    }
}
