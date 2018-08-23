<?php

namespace App\Applications\Site\Http\Routes;


use App\Core\Http\Routes\RoutesFile;

class SiteRoutes extends RoutesFile
{

	protected function routes()
	{
		$this->router->get('/', 'HomeController@index');
		$this->router->get('teste', 'HomeController@index');
		$this->router->post('post-teste', 'HomeController@index');
	}
}