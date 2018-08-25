<?php

namespace App\Applications\Site\Providers;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Lang;
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

        /**
         * Registrando o provedor de rotas
         */
        $this->app->register(RouteServiceProvider::class);

        // dd('Boot');

        //
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'site');
		$this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'site');

        /**
         * Reference: https://github.com/laravel/framework/pull/20599
         */
		$this->loadJSONTranslationsFrom(__DIR__ . '/../resources/lang');

		/*
		 * Set up locale and locale_prefix if other language is selected
		 */
        if (in_array(Request::segment(1), config('app.alt_langs'))) {
            App::setLocale(Request::segment(1));
            config([ 'app.locale_prefix' => Request::segment(1) ]);

            Cookie::queue('last_locale', Request::segment(1), 60 * 24 * 30); // Setando cookie para 30 dias
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // dd('Register');

        // $this->app->register(RouteServiceProvider::class);
        // $this->app->register(EventServiceProvider::class);
    }
}
