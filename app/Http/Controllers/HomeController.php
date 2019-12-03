<?php

namespace SiGEIF\Http\Controllers;

use Illuminate\Http\Request;
use SiGEIF\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexConfiguracoes()
    {   
        $usuarios = DB::table('users')->where('cargo', '!=' , '1')->get();
        $chefe = DB::table('chefeserc')->get();

        return view('configuracoes.configuracoes', compact('usuarios', 'chefe'));
    }

    function promoverAdmin(Request $request){
        
        $usuario = User::find($request->id);
        $usuario->cargo = 2;
        $usuario->save();

        return redirect(route('configuracoes.configuracoes'));
    }

    function rebaixarAdmin(Request $request){
        
        $usuario = User::find($request->id);
        $usuario->cargo = 3;
        $usuario->save();

        return redirect(route('configuracoes.configuracoes'));
    }
}
