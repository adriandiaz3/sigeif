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
					<h4 class="card-title">Cadastre o Chefe da SERC</h4>
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
					<form action="{{ url("/chefeSERC/atualizar") }}" method="POST">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-5 pr-1">
								<div class="form-group">
									<label for="nome">Nome</label>
									<input type="text" name="nome" id="nome" value="{{$chefe->nome}}" class="form-control">
								</div>
							</div>
						</div>
						<input type="hidden" name="id" value="{{$chefe->id}}">
						<button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection