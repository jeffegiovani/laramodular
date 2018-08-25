<?php


namespace App\Applications\Site\Http\Controllers\Artigos;

use App\Applications\Site\Http\Controllers\BaseController;

class ArtigosController extends BaseController
{

    public function index()
    {
        return $this->view('artigos.lista');
    }

    public function categoria()
    {
        return $this->view('artigos.ler');
    }
}