<?php

namespace App\Applications\Site\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

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
        //
		$this->loadViewsFrom(__DIR__.'/../resources/views', 'site');
		$this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'site');

		/*
		 * Set up locale and locale_prefix if other language is selected
		 */
        if (in_array(Request::segment(1), config('app.alt_langs'))) {
            App::setLocale(Request::segment(1));
            config([ 'app.locale_prefix' => Request::segment(1) ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        // $this->app->register(EventServiceProvider::class);
    }
}
