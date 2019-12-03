@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Coordenadores
@endsection

@section('content')

<div class="card striped-table-with-hover">
	<div class="card-header">
		<div class="row justify-content-end">
			<p class="col titulo">Veja os Coordenadores</p>
			@if (auth()->user()->cargo == 1 || auth()->user()->cargo == 2)
				<a href="/coordenador/create" class="col-3 botaoCadastro"><button class="btn btn-primary btn-round">Cadastrar um coordenador</button></a>
			@endif
		</div>
	</div>

		@if(isset($_GET['erro']))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">Você só pode remover coordenadores de curso que não estejam atrelados a nenhum estagiario.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
		@endif

	<div class="card-body">
		<table class="tabelas compact" id="tabelaCoordenadores">
			<thead>
				<tr>
					
					<th></th>
					<th></th>
					<th scope="col">Nome</th>
					<th scope="col">Curso</th>
					<th scope="col">Email</th>
					<th scope="col">Telefone</th>
					<th scope="col">Coordenador do Estagio</th>
				</tr>
			</thead>
			<tbody>
				@foreach($coordenadores as $coordenador)
				<tr>
					@if (auth()->user()->cargo == 1 || auth()->user()->cargo == 2)
						<td>
							<form action="{{ url("/coordenador/editar") }}" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="editar" value="{{$coordenador->id}}">
								<button type="submit" class="iconeBotao"><img class="icon" src="{{ asset('images/icons8-edit-calendar-48.png') }}"></button>
							</form>
						</td>
						<td>
							<form action="{{ url("/coordenador/esconder") }}" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="esconder" value="{{$coordenador->id}}">
								<button type="submit" class="iconeBotao"><img class="icon" src="{{ asset('images/icons8-x-48.png') }}"></button>
							</form>
						</td>
					@else
						<td></td>
						<td></td>
					@endif
					<td>{{$coordenador->nome}}</td>
					<td>{{$coordenador->curso}}</td>
					<td>{{$coordenador->email}}</td>
					<td>{{$coordenador->telefone}}</td>
					<td>{{$coordenador->coordenador_estagio}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection