<?php

namespace App\Core\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
	{
		return view('welcome');
	}
}
