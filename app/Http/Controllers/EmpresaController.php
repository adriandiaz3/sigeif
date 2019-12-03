<?php

namespace SiGEIF\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon; 
use SiGEIF\Empresa;
use SiGEIF\Estagiario;
use Auth;

class EmpresaController extends Controller
{

    private $empresa;
    public function __construct(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }

    function showAll(){
        $empresas = DB::table('empresas')->where('status', '1')->orderBy('quantidade_alunos', 'DESC')->get();
        return view('empresa.showAll', compact('empresas'));
    }

    function historico(){
        $empresas = DB::table('empresas')->where('status', '0')->orderBy('quantidade_alunos', 'DESC')->get();
        return view('empresa.historico', compact('empresas'));
    }

    function esconder(Request $request){

        $contratosEmpresa = DB::table('contrato')->where('empresa', $request->esconder)->get();

        $i = 0;

        foreach ($contratosEmpresa as $key => $resultado) {
            $i++;
        }

        if ($i>0) {
            return redirect()->action('EmpresaController@showAll', 'erro');
        }else{ 
            $empresa = Empresa::find($request->esconder);
            $empresa->status = 0;
            $empresa->save();
            return redirect(route('empresa.showAll'));
        }

    }

    function destroy(Request $request){

        $empresa = Empresa::find($request->excluir);
        $empresa->delete();
        
        return redirect(route('empresa.historico'));
    }

    function reativar(Request $request){

        $empresa = Empresa::find($request->reativar);

        $empresa->status = 1;
        $empresa->save();
        return redirect(route('empresa.historico'));

    }

    function empresasHome(){
        $empresas =  DB::table('empresas')->orderBy('quantidade_alunos', 'DESC')->get();
        return view('home', compact('empresas'));
    }

    function create(){
        return view('empresa.create');
    }

    function edit(Request $request){
        $empresa = new Empresa();

        $empresa = DB::table('empresas')->find($request->editar);

        return view('empresa.edit', compact('empresa'));
    }

    function update(Request $request){
        $id = $request->id;
        $params = $request->all();
        $empresa = Empresa::find($id);
        $empresa->update($params);
                 
        return redirect(route('empresa.showAll'));
    }

    function store(Request $request){

        $this->validate($request, $this->empresa->rules, $this->empresa->mensagens);

    	$empresa = new Empresa();
    	$empresa->vencimento = $request->vencimento;
    	$empresa->numero_convenio = mb_strtoupper($request->numero_convenio, 'UTF-8');
    	$empresa->quantidade_alunos = 0;
    	$empresa->razao_social = mb_strtoupper($request->razao_social, 'UTF-8');
    	$empresa->cnpj = $request->cnpj;
    	$empresa->endereco = mb_strtoupper($request->endereco, 'UTF-8');
    	$empresa->responsavel = mb_strtoupper($request->responsavel, 'UTF-8');
    	$empresa->cpf = $request->cpf;
    	$empresa->telefone = $request->telefone;
    	$empresa->email = mb_strtoupper($request->email, 'UTF-8');
    	$empresa->save();

        return redirect(route('empresa.create'));
    }
}
