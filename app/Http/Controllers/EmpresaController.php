<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\Empresa;
use Auth;

class EmpresaController extends Controller
{
     function index(){
   		//$meses = Mes::all();
    	//return view('mes.index', compact('meses'));	
   }

    function show(Mes $mes) {
        //return view('mes.show', compact('mes'));
    }

    function showAll(){
        $empresas = Empresa::all();
        return view('empresa.showAll', compact('empresas'));
    }

    function create(){
        return view('empresa.create');
    }

    function store(Request $request){

    	$empresa = new Empresa();
    	$empresa->vencimento = $request->vencimento;
    	$empresa->numero_convenio = $request->numero_convenio;
    	$empresa->quantidade_alunos = $request->quantidade_alunos;
    	$empresa->razao_social = $request->razao_social;
    	$empresa->cnpj = $request->cnpj;
    	$empresa->endereco = $request->endereco;
    	$empresa->responsavel = $request->responsavel;
    	$empresa->cpf = $request->cpf;
    	$empresa->telefone = $request->telefone;
    	$empresa->email = $request->email;
    	$empresa->save();

        return redirect(route('empresa.create'));
    }
}
