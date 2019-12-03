@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Cadastrar coordenador
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Cadastre um coordenador</h4>
				</div>

				@if( isset($errors) && count($errors) > 0 )
				        @foreach( $errors->all() as $error )
				            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{$error}}
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
				        @endforeach
				@endif


				<div class="card-body">
					<form action="{{ url("/coordenador") }}" method="POST">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-5 pr-1">
								<div class="form-group">
									<label for="nome">Nome</label>
									<input type="text" name="nome" id="nome" placeholder="Nome" class="form-control">
								</div>
							</div>
							<div class="col-md-3 px-1">
								<div class="form-group">
									<label for="curso">Curso</label>
									<input type="text" name="curso" id="curso" placeholder="Nome do Curso" class="form-control">
								</div>
							</div>
							<div class="col-md-4 pl-1">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" placeholder="Email" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 pr-1">
								<div class="form-group">
									<label for="telefone">Telefone</label>
									<input type="text" name="telefone" id="telefone" placeholder="Telefone" class="form-control">
								</div>
							</div>
							<div class="col-md-6 pl-1">
								<div class="form-group">
									<label for="coordenador_estagio">Coordenador de</label>
									<select  class="form-control" name="coordenador_estagio">
										<option value=""></option>
                                        <option value="Curso">Curso</option>
                                        <option value="Estágio">Estágio</option>
									</select>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection