@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Configurações
@endsection

@section('content')

<div class="card strpied-tabled-with-hover">

	<div class="card-header">
		<div class="row justify-content-end">
			<p class="col titulo">Configurações<p>
			</div>
		</div>

		<div class="row justify-content-around mb-5">
			<p class="tituloRelatorio col-6 ml-3">Cadastrar um novo usuário com acesso no sistema</p>
			<a href="{{ route('register') }}" class="col-2 btn btn-default">Registrar</a>
		</div>

		<div>
			@if(isset($chefe[0]))
			<div class="row justify-content-around">
				@foreach($chefe as $chefe)
				<p class="tituloRelatorio col-7 ml-5">Editar o chefe da SERC ({{$chefe->nome}})</p>
				<form action="{{ url("/chefeSERC/editar") }}" class="col-2" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="editar" value="{{$chefe->id}}">
					<button type="submit" class="btn btn-default">Editar</button>
				</form>
				@endforeach
			</div>
			@else
			<div class="row justify-content-md-center">
				<p class="tituloRelatorio col-7">Cadastrar o chefe da SERC</p>
				<a href="/chefeSERC/create" class="col-2 btn btn-default">Registrar</a>
			</div>
			@endif
		</div>
		
		<div class="card-body mt-5">
			<table class="tabelas compact" id="tabelaUsuarios">
				<thead>
					<tr>
						<th></th>
						<th></th>
						<th scope="col">Nome</th>
						<th scope="col">Cargo</th>
						<th scope="col">Email</th>
					</tr>
				</thead>
				<tbody>
					@foreach($usuarios as $usuario)
						<tr>
							@if ($usuario->cargo == 3)
								<td>
									<form action="{{ url("/configuracao/promoverAdmin") }}" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="id" value="{{$usuario->id}}">
										<button type="submit" class="iconeBotao"><img class="iconePresenca" src="{{ asset('images/correct-signal.png') }}"></button>
									</form>
								</td>
							@else
								<td></td>
							@endif

							@if ($usuario->cargo == 2)
								<td>
									<form action="{{ url("/configuracao/rebaixarAdmin") }}" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="id" value="{{$usuario->id}}">
										<button type="submit" class="iconeBotao"><img class="iconePresenca" src="{{ asset('images/icons8-x-48.png') }}"></button>
									</form>
								</td>
							@else
								<td></td>
							@endif
							<td>{{$usuario->name}}</td>
							@if ($usuario->cargo == 2)
								<td>Admin</td>
							@elseif ($usuario->cargo == 3)
								<td>Usuario</td>
							@else
								<td></td>
							@endif
							<td>{{$usuario->email}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@endsection