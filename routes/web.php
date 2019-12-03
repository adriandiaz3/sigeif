<?php


Route::get('/', function () {
    return view('home');
});

Route::get('/chefeSERC/create', 'ChefeSERCController@create')
	->middleware('auth')
	->name('chefeSERC.create');

Route::post('/chefeSERC', 'ChefeSERCController@store')
	->middleware('auth')
	->name('chefeSERC.store');

Route::post('/chefeSERC/editar', 'ChefeSERCController@edit')
	->middleware('auth')
	->name('chefeSERC.edit');

Route::post('/chefeSERC/atualizar', 'ChefeSERCController@update')
	->middleware('auth')
	->name('chefeSERC.edit');

Route::post('/contrato/create', 'ContratoController@create')
	->middleware('auth')
	->name('contrato.create');

Route::get('/configuracoes', 'HomeController@indexConfiguracoes')
	->middleware('auth')
	->name('configuracoes.configuracoes');

Route::post('/configuracao/promoverAdmin', 'HomeController@promoverAdmin')
	->middleware('auth')
	->name('configuracoes.promoverAdmin');

Route::post('/configuracao/rebaixarAdmin', 'HomeController@rebaixarAdmin')
	->middleware('auth')
	->name('configuracoes.rebaixarAdmin');

Route::post('/contrato', 'ContratoController@store')
	->middleware('auth')
	->name('contrato.store');

Route::post('/contrato/editar', 'ContratoController@edit')
	->middleware('auth')
	->name('contrato.edit');		

Route::post('/contrato/atualizar', 'ContratoController@update')
	->middleware('auth')
	->name('contrato.edit');

Route::post('/contrato/esconder', 'ContratoController@esconder')
	->middleware('auth')
	->name('contrato.esconder');

Route::post('/contrato/reativar', 'ContratoController@reativar')
	->middleware('auth')
	->name('contrato.reativar');		

Route::get('/contrato/historico', 'ContratoController@historico')
	->middleware('auth')
	->name('contrato.historico');

Route::post('/contrato/excluir', 'ContratoController@destroy')
	->middleware('auth')
	->name('contrato.destroy');

Route::get('/coordenador/create', 'CoordenadorController@create')
	->middleware('auth')
	->name('contrato.create');

Route::post('/coordenador/excluir', 'CoordenadorController@destroy')
	->middleware('auth')
	->name('coordenador.destroy');

Route::post('/coordenador', 'CoordenadorController@store')
	->middleware('auth')
		->name('coordenador.store');

Route::get('/coordenadores', 'CoordenadorController@showAll')
	->middleware('auth')
	->name('coordenador.showAll');
	
Route::post('/coordenador/editar', 'CoordenadorController@edit')
	->middleware('auth')
	->name('coordenador.edit');		

Route::post('/coordenador/atualizar', 'CoordenadorController@update')
	->middleware('auth')
	->name('coordenador.edit');

Route::get('/coordenador/historico', 'CoordenadorController@historico')
	->middleware('auth')
	->name('coordenador.historico');

Route::post('/coordenador/esconder', 'CoordenadorController@esconder')
	->middleware('auth')
	->name('coordenador.esconder');

Route::post('/coordenador/reativar', 'CoordenadorController@reativar')
	->middleware('auth')
	->name('coordenador.reativar');		

Route::get('/empresa/create', 'EmpresaController@create')
	->middleware('auth')
	->name('empresa.create');

Route::post('/empresa/excluir', 'EmpresaController@destroy')
	->middleware('auth')
	->name('empresa.destroy');

Route::post('/empresa', 'EmpresaController@store')
	->middleware('auth')
	->name('empresa.store');

Route::get('/empresas', 'EmpresaController@showAll')
	->middleware('auth')
	->name('empresa.showAll');
	
Route::post('/empresa/editar', 'EmpresaController@edit')
	->middleware('auth')
	->name('empresa.edit');	

Route::post('/empresa/atualizar', 'EmpresaController@update')
	->middleware('auth')
	->name('empresa.edit');	

Route::get('/empresa/historico', 'EmpresaController@historico')
	->middleware('auth')
	->name('empresa.historico');

Route::post('/empresa/esconder', 'EmpresaController@esconder')
	->middleware('auth')
	->name('empresa.esconder');	

Route::post('/empresa/reativar', 'EmpresaController@reativar')
	->middleware('auth')
	->name('empresa.reativar');

Route::get('/estagiarios', 'EstagiarioController@showAll')
	->middleware('auth')
	->name('estagiario.showAll');

Route::get('/estagiarios/jovemAprendiz', 'EstagiarioController@gerarRelatorioJovemAprendiz')
	->middleware('auth')
	->name('estagiario.relatorioJovemAprendiz');

Route::post('/estagiario/excluir', 'EstagiarioController@destroy')
	->middleware('auth')
	->name('estagiario.destroy');

Route::get('/estagiario/contrato', 'EstagiarioController@verContrato')
	->middleware('auth')
	->name('estagiario.contratos');	

Route::get('/estagiario/teste', 'EstagiarioController@teste')
	->middleware('auth')
	->name('estagiario.teste');

Route::get('/estagiario/perfil/{id}', 'EstagiarioController@perfil')
	->middleware('auth')
	->name('estagiario.perfil');

Route::post('/estagiario/contrato', 'EstagiarioController@contrato')
	->middleware('auth')
	->name('estagiario.contrato');

Route::get('/estagiario/relatorio/{id}', 'EstagiarioController@gerarRelatorio')
	->middleware('auth')
	->name('estagiario.relatorioEstagiario');

Route::get('/estagiario/empresa/relatorio/{id}', 'EstagiarioController@gerarRelatorioEmpresa')
	->middleware('auth')
	->name('estagiario.relatorioEmpresa');

Route::post('/estagiarios/relatorio', 'EstagiarioController@relatoriosTurma')
	->middleware('auth')
	->name('estagiario.relatoriosTurma');

Route::post('/estagiario/folhadepresenca', 'EstagiarioController@folhaDePresenca')
	->middleware('auth')
	->name('estagiario.folhaDePresenca');

Route::get('/estagiario/create', 'EstagiarioController@create')
	->middleware('auth')
	->name('estagiario.create');

Route::post('/estagiario', 'EstagiarioController@store')
	->middleware('auth')
	->name('estagiario.store');

Route::post('/estagiario/esconder', 'EstagiarioController@esconder')
	->middleware('auth')
	->name('estagiario.esconder');

Route::get('/estagiario/historico', 'EstagiarioController@historico')
	->middleware('auth')
	->name('estagiario.historico');

Route::post('/estagiario/reativar', 'EstagiarioController@reativar')
	->middleware('auth')
	->name('estagiario.reativar');
//Relatorios
Route::get('/estagiario/ativos', 'EstagiarioController@relatorio')
	->middleware('auth')
	->name('estagiario.relatorio');

Route::post('/estagiario/editar', 'EstagiarioController@edit')
	->middleware('auth')
	->name('estagiario.edit');	

Route::post('/estagiario/atualizar', 'EstagiarioController@update')
	->middleware('auth')
	->name('estagiario.edit');	

//Route::post('/home', 'EstagiarioController@relatorioEmpresas')
//	->middleware('auth')
//	->name('estagiario.relatorioEmpresas');

Route::get('/home', 'EmpresaController@empresasHome')->middleware('auth')->name('home');

Route::get('/', 'EmpresaController@empresasHome')->middleware('auth')->name('home');

Auth::routes();