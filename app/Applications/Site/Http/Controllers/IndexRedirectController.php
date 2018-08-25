<?php

namespace App\Applications\Site\Http\Controllers;


use Illuminate\Support\Facades\Cookie;

class IndexRedirectController extends BaseController
{

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function index()
	{
	    if(Cookie::get('last_locale')){
            return redirect('/' . Cookie::get('last_locale'));
        }

		return redirect('/pt-br');
	}
}