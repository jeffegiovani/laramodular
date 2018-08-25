<?php

namespace App\Applications\Site\Http\Routes;

use App\Core\Http\Routes\RoutesFile;

class SiteRoutes extends RoutesFile
{


    /**
     * @return mixed|void
     *
     * Referencia: https://stackoverflow.com/questions/25082154/how-to-create-multilingual-translated-routes-in-laravel
     */
	protected function routes()
	{
        $all_langs = config('app.all_langs');

        /**
         * Iterate over each language prefix
         */
        foreach( $all_langs as $prefix ){

            /**
             * Register new route group with current prefix
             */
            $this->router->group(['prefix' => $prefix], function() use ($prefix) {

                // Now we need to make sure the default prefix points to default  lang folder.
                if ($prefix == '') $prefix = 'pt-br';

                $this->router->get('/', 'HomeController@index')->name(str_replace('-', '', $prefix) . '_home');

                $this->router
                    ->get(trans('site::routes.sobre',[], $prefix) , 'HomeController@sobre')
                    ->name(str_replace('-', '', $prefix) . '_sobre');

                $this->router
                    ->get(trans('site::routes.produtos',[], $prefix) , 'HomeController@produtos')
                    ->name(str_replace('-', '', $prefix) . '_produtos');

            });
        }

		// $this->router->get('/', 'HomeController@index');
		// $this->router->get('teste', 'HomeController@index');
		// $this->router->post('post-teste', 'HomeController@index');

	}



	protected function mapProdutosRoutes()
    {

    }
}