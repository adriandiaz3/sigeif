@extends('layouts.app')

@section('content-title', 'Home')

@section('content')

<?php
use Carbon\Carbon;
?>

<div class="row justify-content-center mb-4">
	<div>
		<button class="bg-success btn-round textoBranco mr-2" disabled>Convênio feito</button>
	</div>
	<div>
		<button class="bg-warning btn-round textoBranco mr-2" disabled>Possui estágiarios ativos mas não precisa de convênio</button>
	</div>
	<div>
		<button class="bg-danger btn-round textoBranco mr-2" disabled>Precisando de convênio</button>
	</div>
	<div>
		<button class="btn-round" disabled>Sem estágiarios ativos</button>
	</div>
</div>



<div class="content">
	<div class="container-fluid">
		<div class="row">
			@foreach($empresas as $empresa)
			<div class="col-md-4">
				<div class="card cardEmpresas">
					<div class="text-center cardEmpresas 
					<?php if ($empresa->numero_convenio != "") {
						if ($empresa->vencimento == 0) {
							echo "bg-success";
						}else{
					        $data = $empresa->vencimento;
					        $ano = substr($data, 0, 4);
					        $mes = substr($data, 5, 2);
					        $dia = substr($data, 8, 2);

					    	$first = Carbon::create($ano, $mes, $dia);

					        if ($first->isPast()) {
					            echo "bg-danger";
					        } else{
					            echo "bg-success";
					        }
					    }
					}else{
						if ($empresa->quantidade_alunos >= 9) {
							echo "bg-danger";
						} elseif ($empresa->quantidade_alunos >= 1) {
							echo "bg-warning";
						}
					} ?>">
						<p class="nomeEmpresa">{{$empresa->razao_social}}</p>
					</div>
					<div class="card-body text-center">
						<p class="description">Quantidade de alunos ativos: {{$empresa->quantidade_alunos}}</p>
							<?php
								if ($empresa->vencimento == 0) {
									echo "<p>Vencimento não definido</p>";
								} else {
									$data = $empresa->vencimento;
									$ano = substr($data, 0, 4);
									$mes = substr($data, 5, 2);
									$dia = substr($data, 8, 2);

									$vencimento = $dia . "/" . $mes . "/" . $ano;

									echo "<p>Vencimento : {$vencimento}</p>";
								}

								?>
							<?php
								if ($empresa->numero_convenio == "") {
									echo "<p>Sem convênio definido</p>";
								} else {
									echo "<p>Numero do convênio : {$empresa->numero_convenio}</p>";
								}
								?>
						
					</div>
					<?php
					if ($empresa->quantidade_alunos > 0) {
						?>
						<a class="text-center mb-2" href="{{ action('EstagiarioController@gerarRelatorioEmpresa', $empresa->id) }}" target="_blank"><button class="cardEmpresas">Relatório Ativos</button></a>
					<?php
					}
					?>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection