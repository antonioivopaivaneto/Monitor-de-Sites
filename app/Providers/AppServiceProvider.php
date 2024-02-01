<?php

namespace App\Providers;

use App\Models\Check;
use App\Observers\CheckObserver;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Check::observe(CheckObserver::class);
    }
}
