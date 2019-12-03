@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Historico estagiarios
@endsection

@section('content')

<div class="card strpied-tabled-with-hover">

	<div class="card-header">
		<div class="row justify-content-end">
			<p class="col titulo">Historico de estagiarios removidos</p>
		</div>
	</div>

	<div class="card-body">
		<table class="row-border compact tabelas" id="tabelaHistoricoEstagiarios">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col">Telefone</th>
					<th scope="col">Email</th>
					<th scope="col">Nascimento</th>
					<th scope="col">CPF</th>
					<th scope="col">Matrícula</th>
					<th scope="col">Curso</th>
				</tr>
			</thead>
			<tbody id="resultadoHistorico" class="mesmaLinha">
				@foreach($estagiarios as $estagiario)
				<tr class="mesmaLinha">
					<td>{{$estagiario->nome}}</td>
					<td>
						<form action="{{ url("/estagiario/reativar") }}" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="reativar" value="{{$estagiario->id}}">
							<button type="submit" class="iconeBotao"><img class="icone" src="{{ asset('images/correct-signal.png') }}"></button>
						</form>
					</td>
					<td>
		        	<form action="{{ url("/estagiario/editar") }}" method="POST">
	    					{{ csrf_field() }}
	    					<input type="hidden" name="editar" value="{{$estagiario->id}}">
	    					<button type="submit" class="iconeBotao"><img class="icone" src="{{ asset('images/icons8-edit-calendar-48.png') }}"></button>
	    				</form>
			        </td>
			        <td>
		             	<form action="{{ url("/estagiario/excluir") }}" method="POST">
			            	{{ csrf_field() }}
			            	<input type="hidden" name="excluir" value="{{$estagiario->id}}">
			            	<button type="submit" class="iconeBotao"><img class="icone" src="{{ asset('images/icons8-trash-48.png') }}"></button>
		            	</form>
		          	</td>
					
					<td>{{$estagiario->telefone}}</td>
					<td>{{$estagiario->email}}</td>
					<?php
					if ($estagiario->nascimento == 0) {
						echo "<td></td>";
					} else {
						$data = $estagiario->nascimento;
						$ano = substr($data, 0, 4);
						$mes = substr($data, 5, 2);
						$dia = substr($data, 8, 2);

						$nascimento = $dia . "/" . $mes . "/" . $ano;

						echo "<td>{$nascimento}</td>";
					}

					if ($estagiario->cpf == null) {
						echo "<td></td>";
					} else {
						echo "<td>{$estagiario->cpf}</td>";
					}

					if ($estagiario->matricula == null) {
						echo "<td></td>";
					} else {
						echo "<td>{$estagiario->matricula}</td>";
					}
					?>

					@foreach($coordenadores as $curso)
					<?php
					if ($curso->id == $estagiario->curso) {
						echo "<td>{$curso->curso}</td>";
					}
					?>
					@endforeach
					<?php
					if ($estagiario->curso == "") {
						echo "<td></td>";
					} ?>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection