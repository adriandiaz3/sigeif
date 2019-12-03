<?php

namespace SiGEIF\Http\Controllers;

use Illuminate\Http\Request;
use SiGEIF\ChefeSERC;
use DB;

class ChefeSERCController extends Controller
{
    private $chefeSERC;
    public function __construct(ChefeSERC $chefeSERC)
    {
        $this->chefeSERC = $chefeSERC;
    }

    function create(){
        return view('chefeSERC.create');
    }

     function store(Request $request){

        $this->validate($request, $this->chefeSERC->rules, $this->chefeSERC->mensagens);

    	$chefeSERC = new ChefeSERC();
    	$chefeSERC->nome = $request->nome;
    	$chefeSERC->save();

        return redirect(route('configuracoes.configuracoes'));
    }

    function edit(Request $request){
        $chefe = new chefeSERC();

        $chefe = DB::table('chefeserc')->find($request->editar);

        return view('chefeSERC.edit', compact('chefe'));
    }

    function update(Request $request){

        $id = $request->id;
        $params = $request->all();

        $chefeSERC = chefeSERC::find($id);
        $chefeSERC->update($params);
                 
        return redirect(route('configuracoes.configuracoes'));
    }
}
