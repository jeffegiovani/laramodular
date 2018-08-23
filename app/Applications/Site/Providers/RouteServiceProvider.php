<?php

namespace App\Applications\Site\Providers;

use App\Applications\Site\Http\Routes\SiteRoutes;

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
    protected $namespace = 'App\Applications\Site\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapSiteRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSiteRoutes()
    {
		(new SiteRoutes([
			'middleware' => 'web',
			'namespace' => $this->namespace,
			// 'prefix' => 'site',
		]))->register();

        /*Route::middleware('web')
             ->namespace($this->namespace)
             ->group(__DIR__ . '/../routes/site.php');*/
    }

}
