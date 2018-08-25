<?php

namespace App\Applications\Site\Http\Controllers;


class IndexRedirectController extends BaseController
{

	public function index()
	{
		//return [1 => 2];
		return $this->view('home');
	}

	public function sobre()
	{
		//return [1 => 2];
		return $this->view('sobre');
	}
}