<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Bairro;
use App\Cras;
use App\Pesquisa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $this->pesquisa = new Pesquisa;
    }
    
    /** 
     * Retorna a view index.
     * @return view
     */
    public function formulario()
    {
        $cidade = $this->cidade::find(1);

        $cras = $this->cras::all();
        
        return view('pesquisa/formulario',[
            'cidade' => $cidade,
            'cras' => $cras
        ]);
    }


    /** 
     * Faz save do stepinicial.
     * @return view
     */
    public function save(Request $request)
    {
 

        $save = $this->pesquisa::create($request->except('_token'));

        if($save) return response()->json(['status' => 'sucesso', 'mensagem' => '', 'dados' => $save->id]);

        return response()->json(['status' => 'falha', 'mensagem' => 'Ocorreu uma falha or favor tente novamente']);

    }    

    /** 
     * Faz save do stepone.
     * @return view
     */
    public function index(Request $request)
    {
        if (Auth::user()) {
            return redirect('/pesquisa/formulario');

        } else {
            return view('auth/login');
        }
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
