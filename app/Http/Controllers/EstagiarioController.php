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

class EstagiarioController extends Controller
{

    private $estagiario;
    public function __construct(Estagiario $estagiario)
    {
        $this->estagiario = $estagiario;
    }

    function showAll(){
        $alunos = DB::table('estagiarios')->where('status', '1')->orderBy('nome', 'ASC')->get();
        $estagiarios = DB::table('estagiarios')->join('contrato', 'estagiarios.id', '=', 'contrato.estagiario')->where('situacao', '1')->where('estagiarios.status', '1')->get();
        $coordenadores = Coordenador::all();
        $empresas = Empresa::all();
        $contratos = DB::table('contrato')->where('situacao' , '1')->get();


        return view('estagiario.showAll', compact('estagiarios', 'coordenadores', 'empresas', 'contratos', 'alunos'));
    }

    //function verContrato(){
     //   return redirect('/contratos/relatorio_ativos.pdf');
    //}

    function historico(){
        $estagiarios = DB::table('estagiarios')->where('status', '0')->orderBy('nome', 'ASC')->get();
        $coordenadores = Coordenador::all();
        $empresas = Empresa::all();
        return view('estagiario.historico', compact('estagiarios', 'coordenadores', 'empresas'));
    }

    public function gerarRelatorio($id) {
        
        if($id == 0){
            $estagiarios = DB::table('estagiarios')->where('situacao', '2')->orderBy('nome', 'ASC')->get();
        }else{
            $estagiarios = DB::table('estagiarios')->where('situacao', '2')->where('curso', $id)->orderBy('nome', 'ASC')->get();
        }
        
        $coordenadores = Coordenador::all();
        $empresas = Empresa::all();

        return \PDF::loadView('estagiario.relatorioAtivos', compact('estagiarios', 'coordenadores', 'empresas'))
                ->setPaper('A4', 'landscape')
                ->stream('relatorio_ativos.pdf');
                // ->download('relatorio_alunos.pdf');
    }

    public function gerarRelatorioEmpresa($id) {
        // Todos os Alunos
        $contratos = DB::table('estagiarios')->join('contrato', 'estagiarios.id', '=', 'contrato.estagiario')->where('situacao', '1')->where('empresa', $id)->orderBy('nome', 'ASC')->get();
        $coordenadores = Coordenador::all();
        $empresas = Empresa::all();

        return \PDF::loadView('estagiario.relatorioAtivos', compact('contratos', 'coordenadores', 'empresas'))
                ->setPaper('A4', 'landscape')
                ->stream('relatorio_ativos.pdf');
                // ->download('relatorio_alunos.pdf');
    }

    public function gerarRelatorioJovemAprendiz(){
       $contratos = DB::table('estagiarios')->join('contrato', 'estagiarios.id', '=', 'contrato.estagiario')->where('situacao', '1')->where('tipo_estagio', '3')->orderBy('nome', 'ASC')->get();
        $coordenadores = Coordenador::all();
        $empresas = Empresa::all();

        return \PDF::loadView('estagiario.relatorioAtivos', compact('contratos', 'coordenadores', 'empresas'))
                ->setPaper('A4', 'landscape')
                ->stream('relatorio_ativos.pdf');
                // ->download('relatorio_alunos.pdf'); 
    }

    function folhaDePresenca(Request $request){
        $id = $request->contrato;
        $contrato = Contrato::find($id);
        $estagiarios = Estagiario::all();
        $empresas = Empresa::all();
        $chefe = DB::table('chefeserc')->get();

        return \PDF::loadView('estagiario.folhaDePresenca', compact('contrato', 'empresas', 'estagiarios', 'chefe'))
                ->setPaper('A4', 'portrait')
                ->stream('relatorio_ativos.pdf');
    }

    //function relatorioEmpresas(Request $request){
   //     $opcao = $request->opcao;
 //       $estagiarios = DB::table('estagiarios')->where('situacao', '1')->where('empresa', $opcao)->orderBy('nome', 'ASC')->get();
   //     $coordenadores = Coordenador::all();
   ////     $empresas = Empresa::all();
//return view('estagiario.relatorio', compact('estagiarios', 'coordenadores', 'empresas'));
 //   }

     function relatoriosTurma(Request $request){

        $opcao = $request->opcao;

        if ($opcao == 0){
            $contratos = DB::table('estagiarios')->join('contrato', 'estagiarios.id', '=', 'contrato.estagiario')->where('situacao', '1')->orderBy('nome', 'ASC')->get();
        }else{
            $contratos = DB::table('estagiarios')->join('contrato', 'estagiarios.id', '=', 'contrato.estagiario')->where('situacao', '1')->where('curso', $opcao)->orderBy('nome', 'ASC')->get();
        }

        $coordenadores = Coordenador::all();
        $empresas = Empresa::all();

        return \PDF::loadView('estagiario.relatorioAtivos', compact('contratos', 'coordenadores', 'empresas'))
                ->setPaper('A4', 'landscape')
                ->stream('relatorio_ativos.pdf');
                // ->download('relatorio_alunos.pdf');s
    }

    function create(){
    	$cursos = DB::table('coordenadores')->where('coordenador_estagio', 'Curso')->orderBy('curso', 'ASC')->get();
        $empresas = Empresa::all();
        return view('estagiario.create', compact('cursos', 'empresas'));
    }

    function perfil($id){
        $estagiario = Estagiario::find($id);
        $coordenadores = Coordenador::all();
        $empresas = Empresa::all();
        $contratos =  DB::table('contrato')->where('estagiario', $id)->where('status', '1')->orderBy('situacao', 'ASC')->get();

        return view('estagiario.perfil', compact('estagiario', 'contratos', 'empresas', 'coordenadores'));
    }

    function esconder(Request $request){

        $estagiariosContrato = DB::table('contrato')->where('estagiario', $request->esconder)->get();

        $i = 0;

        foreach ($estagiariosContrato as $key => $resultado) {
            $i++;
        }

        if ($i>0) {
            return redirect()->action('EstagiarioController@perfil', ['id' => $request->esconder, 'erro']);
        }else{ 
            $estagiario = Estagiario::find($request->esconder);
            $estagiario->status = 0;
            $estagiario->save();
            return redirect(route('estagiario.showAll'));
        }

    }

    function reativar(Request $request){

        $estagiario = Estagiario::find($request->reativar);

        $estagiario->status = 1;
        $estagiario->save();
        return redirect(route('estagiario.historico'));

    }

    function destroy(Request $request){

        $estagiario = Estagiario::find($request->excluir);
        $estagiario->delete();
        
        return redirect(route('estagiario.historico'));
    }

    function edit(Request $request){
        $cursos = DB::table('coordenadores')->orderBy('curso', 'ASC')->get();
        $estagiario = Estagiario::find($request->editar);

        return view('estagiario.edit', compact('estagiario', 'cursos'));
    }

    function update(Request $request){

        $id = $request->id;
        $params = $request->all();
        $estagiario = Estagiario::find($id);

        $estagiario->nome = mb_strtoupper($request->nome, 'UTF-8');
        $estagiario->telefone = $request->telefone;
        $estagiario->email = mb_strtoupper($request->email, 'UTF-8');
        $estagiario->nascimento = $request->nascimento;
        $estagiario->cpf = $request->cpf;
        $estagiario->matricula = $request->matricula;
        $estagiario->curso = $request->curso;
        
        $estagiario->save();     
        return redirect(route('estagiario.showAll'));
    }

    function store(Request $request){

        $this->validate($request, $this->estagiario->rules, $this->estagiario->mensagens);

        $estagiario = new Estagiario();
        $contrato = new Contrato();

        $id = $request->empresa;
    	
    	$estagiario->nome = mb_strtoupper($request->nome, 'UTF-8');
    	$estagiario->telefone = $request->telefone;
        $estagiario->email = mb_strtoupper($request->email, 'UTF-8');
        $estagiario->nascimento = $request->nascimento;
    	$estagiario->cpf = $request->cpf;
        $estagiario->matricula = $request->matricula;
        $estagiario->curso = $request->curso;
        $estagiario->status = 1;

        if($request->situacao == 1){
            $empresa = Empresa::find($id);
            $empresa->quantidade_alunos = $empresa->quantidade_alunos + 1;

            $empresa->save();
        }

        $estagiario->save();

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
        $contrato->estagiario = $estagiario->id;
        $contrato->status = 1;
        
        $contrato->save();
        return redirect(route('estagiario.create'));
    }
}
