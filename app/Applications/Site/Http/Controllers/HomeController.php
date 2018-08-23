<?php

namespace App\Applications\Site\Http\Controllers;


class HomeController extends BaseController
{

	public function index()
	{
		//return [1 => 2];
		return $this->view('home');
	}
}