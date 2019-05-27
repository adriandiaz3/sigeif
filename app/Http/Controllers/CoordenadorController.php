<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\Coordenador;
use Auth;

class CoordenadorController extends Controller
{
    function index(){
   		//$meses = Mes::all();
    	//return view('mes.index', compact('meses'));	
   }

    function show(Mes $mes) {
        //return view('mes.show', compact('mes'));
    }

    function showAll(){
        $coordenadores = Coordenador::all();
        return view('coordenador.showAll', compact('coordenadores'));
    }

    function create(){
        return view('coordenador.create');
    }

    function store(Request $request){

    	$coordenador = new Coordenador();
    	$coordenador->nome = $request->nome;
    	$coordenador->curso = $request->curso;
    	$coordenador->email = $request->email;
    	$coordenador->telefone = $request->telefone;
    	$coordenador->coordenador_estagio = $request->coordenador_estagio;
    	$coordenador->save();

        return redirect(route('coordenador.create'));
    }
}


