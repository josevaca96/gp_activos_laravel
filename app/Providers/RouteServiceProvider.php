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
    protected $namespace = 'App\Http\Controllers';

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
        // Route::middleware('web')
        //     ->namespace($this->namespace)
        //     ->group(base_path('routes/web.php'));

            Route::middleware('web')
            ->namespace($this->namespace)
            ->group(function () {
            require base_path('routes/web.php');
           require base_path('routes/activos.php');
           require base_path('routes/tipo_activos.php');
           require base_path('routes/empresas.php');
           require base_path('routes/oficinas.php');
           require base_path('routes/departamentos.php');
           require base_path('routes/asignaciones.php');
           require base_path('routes/reportes.php');
           require base_path('routes/error.php');
           require base_path('routes/pdf.php');
           require base_path('routes/role.php');
           require base_path('routes/user.php');
           require base_path('routes/mantenimientos.php');



        });
    }

/**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapCategoriaRoutes()
    {
        Route::middleware('categoria')
            ->namespace($this->namespace)
            ->group(base_path('routes/categoria.php'));
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
