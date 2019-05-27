<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\Estagiario;
use App\Coordenador;
use App\Empresa;
use Auth;

class EstagiarioController extends Controller
{
    function index(){
   		//$estagiarios = Estagiario::all();
    	//return view('estagiario.show');	
   }

    function show(Mes $mes) {
        //return view('mes.show', compact('mes'));
    }

    function showAll(){
        $estagiarios = Estagiario::all();
        $coordenadores = Coordenador::all();
        $empresas = Empresa::all();
        return view('estagiario.showAll', compact('estagiarios', 'coordenadores', 'empresas'));
    }

    function create(){
    	$cursos = Coordenador::all();
        $empresas = Empresa::all();
        return view('estagiario.create', compact('cursos', 'empresas'));
    }

    function store(Request $request){

    	$estagiario = new Estagiario();
    	$estagiario->cadastro = $request->cadastro;
    	$estagiario->nome = $request->nome;
    	$estagiario->telefone = $request->telefone;
        $estagiario->email = $request->email;
        $estagiario->nascimento = $request->nascimento;
    	$estagiario->cpf = $request->cpf;
        $estagiario->matricula = $request->matricula;
        $estagiario->tipo_estagio = $request->tipo_estagio;
    	$estagiario->curso = $request->curso;
    	$estagiario->endereco = $request->endereco;
    	$estagiario->inicial = $request->inicial;
        $estagiario->final = $request->final;
        $estagiario->termo_compromisso = $request->termo_compromisso;
        $estagiario->plano_estagio = $request->plano_estagio;
        $estagiario->aditivo = $request->aditivo;
        $estagiario->relatorio_atividades = $request->relatorio_atividades;
        $estagiario->recisao_contrato = $request->recisao_contrato;
        $estagiario->situacao = $request->situacao;
        $estagiario->observacao = $request->observacao;
    	$estagiario->save();

        return redirect(route('estagiario.create'));
    }
}
