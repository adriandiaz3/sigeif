<?php

namespace SiGEIF\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon; 
use SiGEIF\Coordenador;
use Validator;
use Auth;

class CoordenadorController extends Controller
{

    private $coordenador;
    public function __construct(Coordenador $coordenador)
    {
        $this->coordenador = $coordenador;
    }

    function showAll(String $msg=''){
        $coordenadores = DB::table('coordenadores')->where('status', '1')->get();
        return view('coordenador.showAll', compact('coordenadores'));
    }

    function historico(){
        $coordenadores = DB::table('coordenadores')->where('status', '0')->get();
        return view('coordenador.historico', compact('coordenadores'));
    }

    function esconder(Request $request){

        $estagiariosCurso = DB::table('estagiarios')->where('curso', $request->esconder)->get();

        $i = 0;

        foreach ($estagiariosCurso as $key => $resultado) {
            $i++;
        }

        if ($i>0) {
            return redirect()->action('CoordenadorController@showAll', 'erro');
        }else{ 
            $coordenador = Coordenador::find($request->esconder);
            $coordenador->status = 0;
            $coordenador->save();
            return redirect(route('coordenador.showAll'));
        }

    }

    function reativar(Request $request){

        $id_coordenador = $request->reativar;
        $coordenador = Coordenador::find($id_coordenador);

        $coordenador->status = 1;
        $coordenador->save();
        return redirect(route('coordenador.historico'));
    }

    function destroy(Request $request){

        $coordenador = Coordenador::find($request->excluir);
        $coordenador->delete();
        
        return redirect(route('coordenador.historico'));
    }

    function create(){
        return view('coordenador.create');
    }

    function edit(Request $request){
        $coordenador = new Coordenador();

        $coordenador = DB::table('coordenadores')->find($request->editar);

        return view('coordenador.edit', compact('coordenador'));
    }

    function update(Request $request){

        $this->validate($request, $this->coordenador->rules, $this->coordenador->mensagens); 

        $id = $request->id;
        $params = $request->all();

        $coordenador = Coordenador::find($id);
        $coordenador->update($params);
                 
        return redirect(route('coordenador.showAll'));
    }

    function store(Request $request){

        $this->validate($request, $this->coordenador->rules, $this->coordenador->mensagens);

    	$coordenador = new Coordenador();
    	$coordenador->nome = mb_strtoupper($request->nome, 'UTF-8');
    	$coordenador->curso = mb_strtoupper($request->curso, 'UTF-8');
    	$coordenador->email = mb_strtoupper($request->email, 'UTF-8');
    	$coordenador->telefone = $request->telefone;
    	$coordenador->coordenador_estagio = $request->coordenador_estagio;
    	$coordenador->save();

        return redirect(route('coordenador.showAll'));
    }
}


