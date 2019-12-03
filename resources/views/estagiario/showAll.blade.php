@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Estagiários
@endsection

@section('content')

<?php use Carbon\Carbon; ?>

<div class="card strpied-tabled-with-hover">

	<div class="card-header">
		<div class="row justify-content-end">
			<p class="col titulo">Veja os estagiário</p>
			@if (auth()->user()->cargo == 1 || auth()->user()->cargo == 2)
				<a href="/estagiario/create" class="col-3 botaoCadastro"><button class="btn btn-primary btn-round ">Cadastrar um estagiário</button></a>
			@endif
		</div>
	</div>

	@if (auth()->user()->cargo == 1 || auth()->user()->cargo == 2)
		<form class="form-group" target="_blank" action="{{ url("/estagiarios/relatorio") }}" method="POST">
			{{ csrf_field() }}
			<div>
				<div class="row">
					<div class="col-8"></div>
					<select class="form-control col-3" name="opcao">
						<option value="0">Todos os ativos</option>
						@foreach($coordenadores as $curso)
							@if($curso->coordenador_estagio == "Curso")
								<option value="{{$curso->id}}">{{$curso->curso}}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="row">
					<div class="col-8"></div>
					<div class="col-3">
						<div class="row justify-content-between">
							<p class="col tituloRelatorio">Relatório</p>
							<button type="submit" class="btn btn-success col-3">Ir</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-8"></div>
			<div class="col-3">
				<p class="folhadepresenca">Relatório Jovem Aprendiz</p>
				<a class="text-center" href="{{ action('EstagiarioController@gerarRelatorioJovemAprendiz') }}" target="_blank"><button class="btn btn-success ml-2">Ir</button></a></div>
			
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
					<th scope="col">Nome</th>
					<th scope="col"></th>
					<th scope="col">Telefone</th>
					<th scope="col">Email</th>
					<th scope="col">Nascimento</th>
					<th scope="col">CPF</th>
					<th scope="col">Matrícula</th>
					<th scope="col">Curso</th>
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
					<th scope="col">Recisão de contrato</th>
					<th scope="col">Observação</th>

				</tr>
			</thead>
			<tbody id="resultadoEstagiarios" class="mesmaLinha">
				@foreach($estagiarios as $estagiario)
				<tr class="<?php if ($estagiario->situacao == 1) {
								echo "bg-info";
							} elseif ($estagiario->situacao == 2) {
								echo "bg-warning";
							} elseif ($estagiario->situacao == 3) {
								echo "bg-success";
							} elseif ($estagiario->situacao == 4) {
								echo "bg-danger";
							} ?>">
					<td class="mesmaLinha nome <?php
							$data = $estagiario->final;
					        $ano = substr($data, 0, 4);
					        $mes = substr($data, 5, 2);
					        $dia = substr($data, 8, 2);
					        $final = Carbon::create($ano, $mes, $dia);

					        if ($final->isPast()) {
					          echo "vencido";
					        }
						?>"><a href="estagiario/perfil/{{$estagiario->id}}">
						{{$estagiario->nome}}
					</a></td>

					@if($estagiario->tipo_estagio == 3 && $estagiario->situacao == 1)
						<td><form class="folhadepresenca" action="{{ url("/estagiario/folhadepresenca") }}"  target="_blank" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="contrato" value="{{$estagiario->contrato_id}}">
							<button type="submit" class="iconeBotao"><img class="icone" src="{{ asset('images/icons8-presenca-48.png') }}"></button>
						</form></td>
						@else
						<td></td>
					@endif
					<td>{{$estagiario->telefone}}</td>
					<td>{{$estagiario->email}}</td>
					@if($estagiario->nascimento == 0)
						<td></td>
					@else
						<?php
							$data = $estagiario->nascimento;
							$ano = substr($data, 0, 4);
							$mes = substr($data, 5, 2);
							$dia = substr($data, 8, 2);

							$nascimento = $dia . "/" . $mes . "/" . $ano;

							echo "<td>{$nascimento}</td>";
						?>
					@endif

					@if($estagiario->cpf == 0)
						<td></td>
					@else
						<td>{{$estagiario->cpf}}</td>
					@endif

					@if($estagiario->matricula == 0)
						<td></td>
					@else
						<td>{{$estagiario->matricula}}</td>
					@endif

					@foreach($coordenadores as $curso)
						@if($estagiario->curso == "")
								<td></td>
						@elseif($curso->id == $estagiario->curso)
							<td>{{$curso->curso}}</td>
						@endif
					@endforeach

					@if($estagiario->cadastro == 0)
						<td></td>
					@else
						<?php
							$data = $estagiario->cadastro;
							$ano = substr($data, 0, 4);
							$mes = substr($data, 5, 2);
							$dia = substr($data, 8, 2);

							$cadastro = $dia . "/" . $mes . "/" . $ano;

							echo "<td>{$cadastro}</td>";
						?>
					@endif	

					@if($estagiario->tipo_estagio == 1)
							<td class="text-white text-center">Obrigatorio</td>
						@elseif($estagiario->tipo_estagio == 2)
							<td class="text-white text-center">Não Obrigatorio</td>
						@elseif($estagiario->tipo_estagio == 3)
							<td class="text-white text-center">Jovem Aprendiz</td>
						@elseif($estagiario->tipo_estagio == 4)
							<td class="text-white text-center">CNPq</td>
						@elseif($estagiario->tipo_estagio == 5)
							<td class="text-white text-center">Estágio Externo</td>
						@else
							<td></td>
					@endif

						@foreach($empresas as $empresa)
							@if($estagiario->empresa == "")
								<td></td>
							@elseif($empresa->id == $estagiario->empresa)
								<?php
								$empresa = strval($empresa->razao_social);	
								?>
								<td>{{$empresa}}</td>
							@endif
						@endforeach

						@if($estagiario->inicial == 0)
							<td></td>
						@else
							<?php
								$data = $estagiario->inicial;
								$ano = substr($data, 0, 4);
								$mes = substr($data, 5, 2);
								$dia = substr($data, 8, 2);

								$inicial = $dia . "/" . $mes . "/" . $ano;

								echo "<td>{$inicial}</td>";
							?>
						@endif

						@if($estagiario->final == 0)
							<td></td>
						@else
							<?php
								$data = $estagiario->final;
								$ano = substr($data, 0, 4);
								$mes = substr($data, 5, 2);
								$dia = substr($data, 8, 2);

								$final = $dia . "/" . $mes . "/" . $ano;

								echo "<td>{$final}</td>";
							?>
						@endif

						@if($estagiario->situacao == 1)
							<td class="bg-info  text-white text-center">Ativo</td>
						@elseif($estagiario->situacao == 2)
							<td class="bg-warning text-white text-center">Arquivado</td>
						@elseif($estagiario->situacao == 3)
							<td class="bg-sucess text-white text-center">Finalizado</td>
						@elseif($estagiario->situacao == 4)
							<td class="bg-danger text-white text-center">Em espera</td>
						@else
							<td></td>
						@endif

						@if($estagiario->termo_compromisso == 0)
							<td></td>
						@else
							<?php
								$data = $estagiario->termo_compromisso;
								$ano = substr($data, 0, 4);
								$mes = substr($data, 5, 2);
								$dia = substr($data, 8, 2);

								$termo_compromisso = $dia . "/" . $mes . "/" . $ano;

								echo "<td>{$termo_compromisso}</td>";
							?>
						@endif

						@if($estagiario->plano_estagio == 0)
							<td></td>
						@else
							<?php
								$data = $estagiario->plano_estagio;
								$ano = substr($data, 0, 4);
								$mes = substr($data, 5, 2);
								$dia = substr($data, 8, 2);

								$plano_estagio = $dia . "/" . $mes . "/" . $ano;

								echo "<td>{$plano_estagio}</td>";
							?>
						@endif

						@if($estagiario->aditivo == 0)
							<td></td>
						@else
							<?php
								$data = $estagiario->aditivo;
								$ano = substr($data, 0, 4);
								$mes = substr($data, 5, 2);
								$dia = substr($data, 8, 2);

								$aditivo = $dia . "/" . $mes . "/" . $ano;

								echo "<td>{$aditivo}</td>";
							?>
						@endif

						@if($estagiario->relatorio_atividades == 0)
							<td></td>
						@else
							<?php
								$data = $estagiario->relatorio_atividades;
								$ano = substr($data, 0, 4);
								$mes = substr($data, 5, 2);
								$dia = substr($data, 8, 2);

								$relatorio_atividades = $dia . "/" . $mes . "/" . $ano;

								echo "<td>{$relatorio_atividades}</td>";
							?>
						@endif

						@if($estagiario->relatorio_atividades == 0)
							<td></td>
						@else
							<?php
								$data = $estagiario->relatorio_atividades;
								$ano = substr($data, 0, 4);
								$mes = substr($data, 5, 2);
								$dia = substr($data, 8, 2);

								$relatorio_atividades = $dia . "/" . $mes . "/" . $ano;

								echo "<td>{$relatorio_atividades}</td>";
							?>
						@endif
						<td>{{$estagiario->observacao}}</td>
						</tr>
				@endforeach

					<?php
						foreach ($estagiarios as $key => $estagiario) {
							$nomeInseridos[$key] = $estagiario->nome;
							$i = $key;
						}
					?>
				
					@foreach($alunos as $aluno)
					<?php
						$registrado = array_search($aluno->nome, $nomeInseridos);
						if (is_int($registrado)) {

						}else{
							$i++;
							$nomeInseridos[$i] = $aluno->nome;
					?>
						<tr>
							<td class="mesmaLinha nome"><a href="estagiario/perfil/{{$aluno->id}}">{{$aluno->nome}}</a></td>
							<td></td>
							<td>{{$aluno->telefone}}</td>
							<td>{{$aluno->email}}</td>
							@if($aluno->nascimento == 0)
								<td></td>
							@else
								<?php
									$data = $aluno->nascimento;
									$ano = substr($data, 0, 4);
									$mes = substr($data, 5, 2);
									$dia = substr($data, 8, 2);

									$nascimento = $dia . "/" . $mes . "/" . $ano;

									echo "<td>{$nascimento}</td>";
								?>
							@endif

							@if($aluno->cpf == 0)
								<td></td>
							@else
								<td>{{$aluno->cpf}}</td>
							@endif

							@if($aluno->matricula == 0)
								<td></td>
							@else
								<td>{{$aluno->matricula}}</td>
							@endif

							@foreach($coordenadores as $curso)
								@if($aluno->curso == "")
										<td></td>
								@elseif($curso->id == $aluno->curso)
									<td>{{$curso->curso}}</td>
								@endif
							@endforeach
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					<?php
						}	
					?>
					@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection