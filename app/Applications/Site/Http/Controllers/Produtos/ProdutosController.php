<?php


namespace App\Applications\Site\Http\Controllers\Produtos;

use App\Applications\Site\Http\Controllers\BaseController;

class ProdutosController extends BaseController
{

    public function index()
    {
        return $this->view('produtos');
    }

    public function produtos()
    {
        return $this->view('produtos');
    }
}