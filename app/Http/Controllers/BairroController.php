<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bairro;

class BairroController extends Controller
{
    /**
     * construtor do controller bairro
     */
    public function __construct()
    {
        $this->bairro = new Bairro;
    }

    /**
     * Pega todos os bairros de acorto com id do cras
     * @param integer $id
     * @return view
     */
    public function getBairros(Request $request)
    {
        $bairros = $this->bairro::where('cras_id', $request->id)->get();   
        return view('pesquisa/bairros',[
            'bairros' =>  $bairros
        ]);
    }
}
