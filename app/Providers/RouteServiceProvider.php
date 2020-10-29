<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

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

        Route::get('/testing', function () {
            return response()->json([
                'application' => config('app.name'),
                'environment' => config('app.env'),
                'status'      => 200
            ]);
        })->name('testing');

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
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
        $modules = config('modules');

        foreach ($modules as $module) {
            Route::prefix('api')
                ->middleware('api')
                ->namespace("App\\Services\\{$module}\\Controllers")
                ->group(base_path("app/Services/{$module}/Routing/web.php"));
        }

        // Route::middleware('web')
        //     ->namespace($this->namespace)
        //     ->group(base_path('routes/web.php'));
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
        $modules = config('modules');

        foreach ($modules as $module) {
            Route::prefix('api')
                ->middleware('api')
                ->namespace("App\\Services\\{$module}\\Controllers")
                ->group(base_path("app/Services/{$module}/Routing/api.php"));
        }

        // init config
        // Route::prefix('api')
        //     ->middleware('api')
        //     ->namespace($this->namespace)
        //     ->group(base_path('routes/api.php'));
    }
}
