@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Historico contratos
@endsection

@section('content')
<?php use Carbon\Carbon; ?>

<div class="card strpied-tabled-with-hover">

  <div class="card-header mb-2">
	<div class="row justify-content-end">
	  <p class="col titulo">Historico de empresas</p>
	</div>
  </div>

  <div class="card-body">
	<table id="tabelaHistoricoContratos" class="row-border compact tabelas">

	 <thead>
		<tr>
		  <th scope="col">Nome</th>
		  <th scope="col"></th>
		  <th scope="col"></th>
		  <th scope="col"></th>
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
	  <tbody id="resultadoEmpresas">
		@foreach($contratos as $contrato)
		<tr class="mesmaLinha">
			<td>{{$contrato->nome}}</td>
          <td>
	            <form action="{{ url("/contrato/reativar") }}" method="POST">
	              {{ csrf_field() }}
	              <input type="hidden" name="reativar" value="{{$contrato->contrato_id}}">
	              <button type="submit" class="iconeBotao"><img class="icone" src="{{ asset('images/correct-signal.png') }}"></button>
	            </form>
	        </td>
	        <td>
	        	<form action="{{ url("/contrato/editar") }}" method="POST">
    					{{ csrf_field() }}
    					<input type="hidden" name="editar" value="{{$contrato->contrato_id}}">
    					<button type="submit" class="iconeBotao"><img class="icone" src="{{ asset('images/icons8-edit-calendar-48.png') }}"></button>
    				</form>
	        </td>
	        <td>
             <form action="{{ url("/contrato/excluir") }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="excluir" value="{{$contrato->contrato_id}}">
              <button type="submit" class="iconeBotao"><img class="icone" src="{{ asset('images/icons8-trash-48.png') }}"></button>
            </form>
          </td>
	        @if($contrato->cadastro == 0)
	            <td></td>
	        @else
	            <?php
		            $data = $contrato->cadastro;
		            $ano = substr($data, 0, 4);
		            $mes = substr($data, 5, 2);
		            $dia = substr($data, 8, 2);

		            $cadastro = $dia . "/" . $mes . "/" . $ano;
	            ?>
            	<td>{{$cadastro}}</td>
         	@endif

          	@if($contrato->tipo_estagio == 1)
              	<td class="text-center">Obrigatorio</td>
            @elseif($contrato->tipo_estagio == 2)
             	 <td class="text-center">Não Obrigatorio</td>
            @elseif($contrato->tipo_estagio == 3)
             	 <td class="text-center">Jovem Aprendiz</td>
            @elseif($contrato->tipo_estagio == 4)
             	 <td class="text-center">CNPq</td>
            @elseif($contrato->tipo_estagio == 5)
              	<td class="text-center">Estágio Externo</td>
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
              ?>
              <td>{{$inicial}}</td>
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
              ?>
              <td>{{$final}}</td>
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
              ?>
              <td>{{$termo_compromisso}}</td>
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
              ?>

              <td>{{$plano_estagio}}</td>
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
              ?>
              <td>{{$aditivo}}</td>
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
              ?>
              <td>{{$relatorio_atividades}}</td>
            @endif

            @if($contrato->recisao_contrato == 0)
              <td></td>
            @else
              <?php
                $data = $contrato->recisao_contrato;
                $ano = substr($data, 0, 4);
                $mes = substr($data, 5, 2);
                $dia = substr($data, 8, 2);

                $recisao_contrato = $dia . "/" . $mes . "/" . $ano;
              ?>
              <td>{{$recisao_contrato}}</td>
            @endif
            <td>{{$contrato->observacao}}</td>
		</tr>
		@endforeach
	  </tbody>
	</table>
  </div>
</div>
@endsection