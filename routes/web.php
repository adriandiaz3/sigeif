<?php


Route::get('/', function () {
    return view('home');
});

Route::get('/coordenador/create', 'CoordenadorController@create')
	->name('coordenador.create');

Route::post('/coordenador', 'CoordenadorController@store')
		->name('coordenador.store');

Route::get('/coordenadores', 'CoordenadorController@showAll')
		->name('coordenadores.showAll');				

Route::get('/empresa/create', 'EmpresaController@create')
	->name('empresa.create');

Route::post('/empresa', 'EmpresaController@store')
	->name('empresa.store');

Route::get('/empresas', 'EmpresaController@showAll')
		->name('empresas.showAll');	

Route::get('/estagiario/create', 'EstagiarioController@create')
	->name('estagiario.create');

Route::post('/estagiario', 'EstagiarioController@store')
		->name('estagiario.store');

Route::get('/estagiarios', 'EstagiarioController@showAll')
		->name('estagiarios.showAll');		
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
