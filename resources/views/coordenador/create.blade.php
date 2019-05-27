@extends('layouts.app')

@section('titulo')
	Cadastrando um coordenador
@endsection

@section('conteudo')
		<div class="mt-4 container">

			<h1 class="text-center mb-3">Cadastre um coordenador</h1>

			<form action="{{ url("/coordenador") }}" method="POST">
			{{ csrf_field() }}
				<div class="form-group row">
					<label id="descricao"  class="col-sm-2 col-form-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" name="nome" class="form-control required">
					</div>	
				</div>
				<div class="form-group row">
					<label id="descricao"  class="col-sm-2 col-form-label">Curso</label>
					<div class="col-sm-10">
						<input type="text" name="curso" class="form-control required">
					</div>	
				</div>
				<div class="form-group row">
					<label id="descricao"  class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="email" name="email" class="form-control required">
					</div>	
				</div>
				<div class="form-group row">
					<label id="descricao"  class="col-sm-2 col-form-label">Telefone</label>
					<div class="col-sm-10">
						<input type="number" name="telefone" class="form-control required">
					</div>	
				</div>
				<div class="form-group row">
					<label id="descricao"  class="col-sm-2 col-form-label">Coordenador do Estagio</label>
					<div class="col-sm-10">
						<input type="text" name="coordenador_estagio" class="form-control required">
					</div>	
				</div>
			    <button type="submit" class="btn btn-primary">SALVAR</button>
			</form>    
	</div>
@endsection
