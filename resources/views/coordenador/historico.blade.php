@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Coordenadores
@endsection

@section('content')

<div class="card striped-table-with-hover">
	<div class="card-header">
		<div class="row justify-content-end">
			<p class="col titulo">Historico de Coordenadores</p>
		</div>
	</div>

	<div class="card-body">
		<table class="row-border compact tabelas" id="tabelaHistoricoCoordenadores">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col">Curso</th>
					<th scope="col">Email</th>
					<th scope="col">Telefone</th>
					<th scope="col">Coordenador do Estagio</th>
				</tr>
			</thead>
			<tbody>
				@foreach($coordenadores as $coordenador)
				<tr>
					<td>{{$coordenador->nome}}</td>
					<td>
						<form action="{{ url("/coordenador/reativar") }}" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="reativar" value="{{$coordenador->id}}">
							<button type="submit" class="iconeBotao"><img class="iconePresenca" src="{{ asset('images/correct-signal.png') }}"></button>
						</form>
					</td>
					<td>
						<form action="{{ url("/coordenador/editar") }}" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="editar" value="{{$coordenador->id}}">
							<button type="submit" class="iconeBotao"><img class="iconePresenca" src="{{ asset('images/icons8-edit-calendar-48.png') }}"></button>
						</form>
					</td>
					<td>
						<form action="{{ url("/coordenador/excluir") }}" method="POST">
							{{ csrf_field() }}
					  		<input type="hidden" name="excluir" value="{{$coordenador->id}}">
							<button type="submit" class="iconeBotao"><img class="iconePresenca" src="{{ asset('images/icons8-trash-48.png') }}"></button>
						</form>
				  </td>
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