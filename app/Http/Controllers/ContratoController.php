<?php

namespace SiGEIF\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; 
use SiGEIF\Estagiario;
use SiGEIF\Coordenador;
use SiGEIF\Empresa;
use SiGEIF\Documento;
use SiGEIF\Contrato;
use DB;
use Auth;

class ContratoController extends Controller
{
     function esconder(Request $request){

        $contrato = Contrato::find($request->esconder);

        if($contrato->situacao == 1){
            $empresa = Empresa::find($contrato->empresa);
            $empresa->quantidade_alunos = $empresa->quantidade_alunos - 1;
            
            $contrato->status = 0;
            $empresa->save();
            $contrato->save();
            return redirect(route('estagiario.perfil', ['id' => $contrato->estagiario]));
;
        }else{
            $contrato->status = 0;
            $contrato->save();
            return redirect(route('estagiario.perfil', ['id' => $contrato->estagiario]));
        }

    }

    function reativar(Request $request){

        $contrato = Contrato::find($request->reativar);

        if($contrato->situacao == 1){
            $empresa = Empresa::find($contrato->empresa);
            $empresa->quantidade_alunos = $empresa->quantidade_alunos + 1;
            
            $contrato->status = 1;
            $empresa->save();
            $contrato->save();
            return redirect(route('contrato.historico'));
;
        }else{
            $contrato->status = 1;
            $contrato->save();
            return redirect(route('contrato.historico'));
        }

    }

    function destroy(Request $request){

        $contrato = Contrato::find($request->excluir);
        $contrato->delete();
        
        return redirect(route('contrato.historico'));
    }

    function historico(){
        $contratos = DB::table('estagiarios')->join('contrato', 'estagiarios.id', '=', 'contrato.estagiario')->where('contrato.status', '0')->get();
        $empresas = Empresa::all();
        return view('contrato.historico', compact('contratos', 'empresas'));
    }

    function create(Request $request){
    	$estagiario_id = $request->estagiario;
    	$estagiario = Estagiario::find($estagiario_id);
    	$coordenadores = Coordenador::all();
        $empresas = Empresa::all();
        return view('contrato.create', compact('estagiario', 'empresas', 'coordenadores'));
    }

     function store(Request $request){
        $contrato = new Contrato();

        $id = $request->empresa;

        if($request->situacao == 1){
            $empresa = Empresa::find($id);
            $empresa->quantidade_alunos = $empresa->quantidade_alunos + 1;

            $empresa->save();
        }

        $contrato->cadastro = $request->cadastro;
        $contrato->tipo_estagio = $request->tipo_estagio;
    	$contrato->empresa = $request->empresa;
    	$contrato->inicial = $request->inicial;
        $contrato->final = $request->final;
        $contrato->termo_compromisso = $request->termo_compromisso;
        $contrato->plano_estagio = $request->plano_estagio;
        $contrato->aditivo = $request->aditivo;
        $contrato->relatorio_atividades = $request->relatorio_atividades;
        $contrato->recisao_contrato = $request->recisao_contrato;
        $contrato->situacao = $request->situacao;
        $contrato->observacao = $request->observacao;
        $contrato->estagiario = $request->estagiario_id;
        $contrato->status = 1;
        
        $contrato->save();
        return redirect(route('estagiario.perfil', ['id' => $request->estagiario_id]));
    }

    function edit(Request $request){
        $empresas = DB::table('empresas')->orderBy('razao_social', 'ASC')->get();
        $contrato = Contrato::find($request->editar);
        $estagiario = Estagiario::find($contrato->estagiario);

        return view('contrato.edit', compact('estagiario','empresas', 'contrato'));
    }

    function update(Request $request){

        $id = $request->id;
        $contrato = Contrato::find($id);

        if ($contrato->empresa == $request->empresa) {
            if ($contrato->situacao==1 && $request->situacao!=1) {
                $id_empresa = $contrato->empresa;
                $empresa = Empresa::find($id_empresa);
                $empresa->quantidade_alunos = $empresa->quantidade_alunos - 1;
                $empresa->save();
            }elseif ($contrato->situacao==1 && $request->situacao==1){
    
            }elseif ($contrato->situacao!=1 && $request->situacao==1) {
                $id_empresa = $request->empresa;
                $empresa = Empresa::find($id_empresa);
                $empresa->quantidade_alunos = $empresa->quantidade_alunos + 1;
                $empresa->save();
            }
            
        }else{
            if ($contrato->situacao==1 && $request->situacao!=1) {
                $id_empresa = $contrato->empresa;
                $empresa = Empresa::find($id_empresa);
                $empresa->quantidade_alunos = $empresa->quantidade_alunos - 1;
                $empresa->save();

            }elseif ($contrato->situacao==1 && $request->situacao==1){
                $id_empresa = $contrato->empresa;
                $empresa = Empresa::find($id_empresa);
                $empresa->quantidade_alunos = $empresa->quantidade_alunos - 1;
                $empresa->save();

                $id_empresanova = $request->empresa;
                $empresanova = Empresa::find($id_empresanova);
                $empresanova->quantidade_alunos = $empresanova->quantidade_alunos + 1;
                $empresanova->save();
    
            }elseif ($contrato->situacao!=1 && $request->situacao==1) {

                $id_empresanova = $request->empresa;
                $empresa = Empresa::find($id_empresanova);
                $empresa->quantidade_alunos = $empresa->quantidade_alunos + 1;
                $empresa->save();
            }
            
        }

        $contrato->cadastro = $request->cadastro;
        $contrato->tipo_estagio = $request->tipo_estagio;
        $contrato->empresa = $request->empresa;
        $contrato->inicial = $request->inicial;
        $contrato->final = $request->final;
        $contrato->termo_compromisso = $request->termo_compromisso;
        $contrato->plano_estagio = $request->plano_estagio;
        $contrato->aditivo = $request->aditivo;
        $contrato->relatorio_atividades = $request->relatorio_atividades;
        $contrato->recisao_contrato = $request->recisao_contrato;
        $contrato->situacao = $request->situacao;
        $contrato->observacao = $request->observacao;
        
        $contrato->save();     
        return redirect(route('estagiario.perfil', ['id' => $contrato->estagiario]));
    }
}
