<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Bairro;
use App\Cras;
use App\Pesquisa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        return view('pesquisa/etapainicial',[
            'cidade' => $cidade,
            'cras' => $cras
        ]);
    }


    /** 
     * Retorna a view index.
     * @return view
     */
    public function stepone()
    {

        $aberto = $this->pesquisa::where('user_id', Auth::user()->id)->where('second_step', true)->where('finalizado', null)->first();
        if (!empty($aberto)) {
            return redirect('/pesquisa/secondstep/');
        }

        $cidade = $this->cidade::find(1);

        $cras = $this->cras::all();
        
        return view('pesquisa/firststep',[
            'cidade' => $cidade,
            'cras' => $cras
        ]);
    }


    /** 
     * Faz save do stepinicial.
     * @return view
     */
    public function etapainicialsave(Request $request)
    {
        $save = $this->pesquisa::create($request->except('_token'));

        if($save) return response()->json(['status' => 'sucesso', 'mensagem' => '', 'dados' => $save->id]);

        return response()->json(['status' => 'falha', 'mensagem' => 'Ocorreu uma falha or favor tente novamente']);

    }    

    /** 
     * Faz save do stepone.
     * @return view
     */
    public function steponesave(Request $request)
    {
        $aberto = $this->pesquisa::where('user_id', Auth::user()->id)->where('second_step', null)->where('finalizado', null)->first();

        $update = $this->pesquisa::where('id', $aberto->id)->update($request->except('_token'));

        if($update) return response()->json(['status' => 'sucesso', 'mensagem' => '', 'dados' => '']);

        return response()->json(['status' => 'falha', 'mensagem' => 'Ocorreu uma falha or favor tente novamente']);

    }

    /** 
     * Faz save do stepone.
     * @return view
     */
    public function secondstep(Request $request)
    {

        return view('pesquisa/secondstep');
    }

    /** 
     * Faz save do stepone.
     * @return view
     */
    public function secondstepsave(Request $request)
    {

        $aberto = $this->pesquisa::where('user_id', Auth::user()->id)->where('finalizado', null)->first();

        $update = $this->pesquisa::where('id', $aberto->id)->update($request->except('_token'));

        if($update) return response()->json(['status' => 'sucesso', 'mensagem' => '']);

        return response()->json(['status' => 'falha', 'mensagem' => 'Ocorreu uma falha or favor tente novamente']);

    }


    /** 
     * Faz save do stepone.
     * @return view
     */
    public function index(Request $request)
    {
        if (Auth::user()) {
            return redirect('/pesquisa/etapainicial');

        } else {
            return view('auth/login');
        }
    }
}
