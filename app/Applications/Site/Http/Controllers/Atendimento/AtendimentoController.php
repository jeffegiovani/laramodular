<?php


namespace App\Applications\Site\Http\Controllers\Atendimento;

use App\Applications\Site\Http\Controllers\BaseController;

class AtendimentoController extends BaseController
{

    public function index()
    {
        return $this->view('atendimento.fale_conosco');
    }
}