<?php

namespace App\Providers;

use App\Models\Cashier\User;
use Illuminate\Support\ServiceProvider;
/* use Illuminate\Pagination\Paginator; */

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
        /* Paginator::useBootstrap(); */
    }
}
