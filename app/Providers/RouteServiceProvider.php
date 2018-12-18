<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        if (!\Schema::hasTable('routes') || !class_exists(\ARudkovskiy\Admin\Models\Route::class)) {
            return;
        }

        $path = request()->path();
        if (!starts_with($path, '/')) {
            $path = '/' . $path;
        }

        $dynamicRouterRule = \ARudkovskiy\Admin\Models\Route::whereUrl($path)->first();
        if ($dynamicRouterRule !== null) {
            \Route::middleware('web')
                ->group(function () use ($dynamicRouterRule) {
                    \Route::get($dynamicRouterRule->url, function () use ($dynamicRouterRule) {
                        $action = $dynamicRouterRule->action;
                        $argument = $dynamicRouterRule->routable;

                        return \App::call($action, [ $argument ]);
                    });
                });
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
