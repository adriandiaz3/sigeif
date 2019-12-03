@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Estagiário
@endsection

@section('content')

<div class="card strpied-tabled-with-hover">

	<div class="card-header">
		<div class="row justify-content-end">
			<p class="col titulo">Perfil do estagiário {{$estagiario->nome}}</p>
			@if (auth()->user()->cargo == 1 || auth()->user()->cargo == 2)
				<form action="{{ url("/estagiario/editar") }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="editar" value="{{$estagiario->id}}">
					<button type="submit" class="iconeBotao"><img class="icon" src="{{ asset('images/icons8-edit-calendar-48.png') }}"></button>
				</form>
				<form action="{{ url("/estagiario/esconder") }}" method="POST">
	              {{ csrf_field() }}
	              <input type="hidden" name="esconder" value="{{$estagiario->id}}">
	              <button type="submit" class="iconeBotao"><img class="icon" src="{{ asset('images/icons8-x-48.png') }}"></button>
	            </form>
				<form action="{{ url("/contrato/create") }}" method="POST">		
					{{ csrf_field() }}
					<input type="hidden" name="estagiario" value="{{$estagiario->id}}">
					<button class="submit btn btn-primary btn-round ">Cadastrar um contrato</button>
				</form>
			@endif
		</div>
	</div>

	@if(isset($_GET['erro']))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">Você só pode remover alunos sem nenhum contrato.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    @endif

	<div>
		<button class="bg-info btn-round textoBranco" disabled>Ativo</button>
		<button class="bg-warning btn-round textoBranco" disabled>Arquivado</button>
		<button class="bg-success btn-round textoBranco" disabled>Finalizado</button>
		<button class="bg-danger btn-round textoBranco" disabled>Em espera</button>
	</div>
	<div class="card-body">
		<table class="row-border compact tabelas" id="tabelaEstagiarios">
			<thead>
				<tr>
					<th></th>
					<th></th>
					<th scope="col">Cadastro</th>
					<th scope="col">Tipo de estágio</th>
					<th scope="col">Empresa</th>
					<th scope="col">Inicial</th>
					<th scope="col">Final</th>
					<th scope="col">Situação</th>
					<th scope="col">Termo de Compromisso</th>
					<th scope="col">Plano de Estágio</th>
					<th scope="col">Aditivo</th>
					<th scope="col">Relatório de Atividades</th>
					<th scope="col">Rescisão de contrato</th>
					<th scope="col">Observação</th>

				</tr>
			</thead>
			<tbody id="resultadoEstagiarios" class="mesmaLinha">
				
					@foreach($contratos as $contrato)
					<tr class="<?php if ($contrato->situacao == 1) {
								echo "bg-info";
							} elseif ($contrato->situacao == 2) {
								echo "bg-warning";
							} elseif ($contrato->situacao == 3) {
								echo "bg-success";
							} elseif ($contrato->situacao == 4) {
								echo "bg-danger";
							} ?>">

						@if (auth()->user()->cargo == 1 || auth()->user()->cargo == 2)
							<td>
								<form action="{{ url("/contrato/editar") }}" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="editar" value="{{$contrato->contrato_id}}">
									<button type="submit" class="iconeBotao"><img class="icone" src="{{ asset('images/icons8-edit-calendar-48.png') }}"></button>
								</form>
							</td>

							<td>
								<form action="{{ url("/contrato/esconder") }}" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="esconder" value="{{$contrato->contrato_id}}">
									<button type="submit" class="iconeBotao"><img class="icone" src="{{ asset('images/icons8-x-48.png') }}"></button>
								</form>
							</td>
						@else
							<td></td>
							<td></td>
						@endif

						@if($estagiario->id == $contrato->estagiario)
							@if($contrato->cadastro == 0)
								<td></td>
							@else
								<?php
									$data = $contrato->cadastro;
									$ano = substr($data, 0, 4);
									$mes = substr($data, 5, 2);
									$dia = substr($data, 8, 2);

									$cadastro = $dia . "/" . $mes . "/" . $ano;

									echo "<td>{$cadastro}</td>";
								?>
							@endif	
							@if($contrato->tipo_estagio == 1)
								<td class="text-white text-center">Obrigatorio</td>
							@elseif($contrato->tipo_estagio == 2)
								<td class="text-white text-center">Não Obrigatorio</td>
							@elseif($contrato->tipo_estagio == 3)
								<td class="text-white text-center">Jovem Aprendiz</td>
							@elseif($contrato->tipo_estagio == 4)
								<td class="text-white text-center">CNPq</td>
							@elseif($contrato->tipo_estagio == 5)
								<td class="text-white text-center">Estágio Externo</td>
							@else
								<td></td>
							@endif

							@foreach($empresas as $empresa)
								@if($contrato->empresa == "")
									<td></td>
								@elseif($empresa->id == $contrato->empresa)
									<?php
									$empresa = strval($empresa->razao_social);	
									?>
									<td>{{$empresa}}</td>
								@endif
							@endforeach

							@if($contrato->inicial == 0)
								<td></td>
							@else
								<?php
									$data = $contrato->inicial;
									$ano = substr($data, 0, 4);
									$mes = substr($data, 5, 2);
									$dia = substr($data, 8, 2);

									$inicial = $dia . "/" . $mes . "/" . $ano;

									echo "<td>{$inicial}</td>";
								?>
							@endif

							@if($contrato->final == 0)
								<td></td>
							@else
								<?php
									$data = $contrato->final;
									$ano = substr($data, 0, 4);
									$mes = substr($data, 5, 2);
									$dia = substr($data, 8, 2);

									$final = $dia . "/" . $mes . "/" . $ano;

									echo "<td>{$final}</td>";
								?>
							@endif

							@if($contrato->situacao == 1)
								<td class="bg-info  text-white text-center">Ativo</td>
							@elseif($contrato->situacao == 2)
								<td class="bg-warning text-white text-center">Arquivado</td>
							@elseif($contrato->situacao == 3)
								<td class="bg-sucess text-white text-center">Finalizado</td>
							@elseif($contrato->situacao == 4)
								<td class="bg-danger text-white text-center">Em espera</td>
							@else
								<td></td>
							@endif

							@if($contrato->termo_compromisso == 0)
								<td></td>
							@else
								<?php
									$data = $contrato->termo_compromisso;
									$ano = substr($data, 0, 4);
									$mes = substr($data, 5, 2);
									$dia = substr($data, 8, 2);

									$termo_compromisso = $dia . "/" . $mes . "/" . $ano;

									echo "<td>{$termo_compromisso}</td>";
								?>
							@endif

							@if($contrato->plano_estagio == 0)
								<td></td>
							@else
								<?php
									$data = $contrato->plano_estagio;
									$ano = substr($data, 0, 4);
									$mes = substr($data, 5, 2);
									$dia = substr($data, 8, 2);

									$plano_estagio = $dia . "/" . $mes . "/" . $ano;

									echo "<td>{$plano_estagio}</td>";
								?>
							@endif

							@if($contrato->aditivo == 0)
								<td></td>
							@else
								<?php
									$data = $contrato->aditivo;
									$ano = substr($data, 0, 4);
									$mes = substr($data, 5, 2);
									$dia = substr($data, 8, 2);

									$aditivo = $dia . "/" . $mes . "/" . $ano;

									echo "<td>{$aditivo}</td>";
								?>
							@endif

							@if($contrato->relatorio_atividades == 0)
								<td></td>
							@else
								<?php
									$data = $contrato->relatorio_atividades;
									$ano = substr($data, 0, 4);
									$mes = substr($data, 5, 2);
									$dia = substr($data, 8, 2);

									$relatorio_atividades = $dia . "/" . $mes . "/" . $ano;

									echo "<td>{$relatorio_atividades}</td>";
								?>
							@endif

							@if($contrato->relatorio_atividades == 0)
								<td></td>
							@else
								<?php
									$data = $contrato->relatorio_atividades;
									$ano = substr($data, 0, 4);
									$mes = substr($data, 5, 2);
									$dia = substr($data, 8, 2);

									$relatorio_atividades = $dia . "/" . $mes . "/" . $ano;

									echo "<td>{$relatorio_atividades}</td>";
								?>
							@endif
							<td>{{$contrato->observacao}}</td>
						@endif
						</tr>
					@endforeach
				
			</tbody>
		</table>
	</div>
</div>
@endsection