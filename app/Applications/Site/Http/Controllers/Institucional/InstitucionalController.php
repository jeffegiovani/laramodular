<?php


namespace App\Applications\Site\Http\Controllers\Institucional;

use App\Applications\Site\Http\Controllers\BaseController;

class InstitucionalController extends BaseController
{

    public function index()
    {
        return $this->view('institucional');
    }
}