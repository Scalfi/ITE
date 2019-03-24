<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Bairro;
use App\Cras;
use Illuminate\Http\Request;

class PesquisaController extends Controller
{
    /**
     * construtor do controller pesquisa
     */
    public function __construct()
    {
        $this->cidade = new Cidade;
        $this->bairro = new Bairro;
        $this->cras = new Cras;

    }
    
    /** 
     * Retorna a view index.
     * @return view
     */
    public function index()
    {
        $cidade = $this->cidade::find(1);

        $cras = $this->cras::all();
        
        return view('pesquisa/index',[
            'cidade' => $cidade,
            'cras' => $cras
        ]);
    }
}
