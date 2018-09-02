<?php

namespace App\Providers;

use App\Http\ViewComposers\FrontendViewComposer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \View::composer('layout.theme', FrontendViewComposer::class);
    }

}
