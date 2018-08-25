<?php

namespace App\Applications\Site\Http\Routes;

use App\Core\Http\Routes\RoutesFile;

class SiteRoutes extends RoutesFile
{

    /**
     * @var array
     */
    protected $all_langs;

    /**
     * @return mixed|void
     *
     * Referencia: https://stackoverflow.com/questions/25082154/how-to-create-multilingual-translated-routes-in-laravel
     */
	protected function routes()
	{
        $this->all_langs = config('app.all_langs');

	    $this->mapSiteRoutes();
	    $this->mapProdutosRoutes();
	    $this->mapArtigosRoutes();

	}

    /**
     * Rotas genéricas do site
     */
    protected function mapSiteRoutes()
    {
        // Home
        $this->router->get('/', 'IndexRedirectController@index')->name('home');

        /**
         * Iterate over each language prefix
         */
        foreach ($this->all_langs as $lang_prefix) {

            /**
             * Register new route group with current prefix
             */
            $this->router->group(['prefix' => $lang_prefix], function () use ($lang_prefix) {

                /**
                 * Site main page
                 */
                $this->router->get('/', 'HomeController@index')->name(str_replace('-', '', $lang_prefix) . '_home');

            });
        }
    }

    /**
     * Rotas da área de produtos
     */
    protected function mapProdutosRoutes()
    {

        /**
         * Iterate over each language prefix
         */
        foreach ($this->all_langs as $lang_prefix) {

            /**
             * Register new route group with current prefix
             */
            $this->router->group([
                'prefix' => $lang_prefix,
                'namespace' => 'Produtos'
            ], function () use ($lang_prefix) {
                $this->router->group(['prefix' => trans('site::routes.produtos', [], $lang_prefix)], function () use ($lang_prefix) {

                    /**
                     * Produtos main page
                     */
                    $this->router
                        ->get('/', 'ProdutosController@index')
                        ->name(str_replace('-', '', $lang_prefix) . '_produtos');

                    /**
                     * Produtos por categoria
                     */
                    $this->router
                        ->get(trans('site::routes.produtos_categ', [], $lang_prefix), 'ProdutosController@categoria')
                        ->name(str_replace('-', '', $lang_prefix) . '_produtos_categ');
                });

            });
        }
    }

    /**
     * Rotas do Artigos
     */
    protected function mapArtigosRoutes()
    {

        /**
         * Iterate over each language prefix
         */
        foreach ($this->all_langs as $lang_prefix) {
            /**
             * Register new route group with current prefix
             */
            $this->router->group([
                'prefix' => $lang_prefix,
                'namespace' => 'Artigos'
            ], function () use ($lang_prefix) {
                $this->router->group(['prefix' => trans('site::routes.artigos', [], $lang_prefix)], function () use ($lang_prefix) {

                    /**
                     * Artigos main page
                     */
                    $this->router
                        ->get('/', 'ArtigosController@index')
                        ->name(str_replace('-', '', $lang_prefix) . '_artigos');

                    /**
                     * Posts da categoria
                     */
                    $this->router
                        ->get(trans('site::routes.artigos_categ', [], $lang_prefix), 'ArtigosController@categoria')
                        ->name(str_replace('-', '', $lang_prefix) . '_artigos_categoria');

                    /**
                     * Posts da categoria
                     */
                    $this->router
                        ->get(trans('site::routes.artigos_tag', [], $lang_prefix), 'ArtigosController@tag')
                        ->name(str_replace('-', '', $lang_prefix) . '_artigos_tag');
                });
            });
        }
    }
}