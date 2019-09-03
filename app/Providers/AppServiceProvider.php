<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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

        // Pass along the side bar menu
        View::share('panel_sidebar_menu', 'value');

        // Pass along the footer menu
        View::share('panel_footer_menu', 'value');
    }
}
