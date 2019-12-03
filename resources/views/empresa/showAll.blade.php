@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Empresas
@endsection

@section('content')
<?php

use Carbon\Carbon;

$texto = "";
?>

<div class="card strpied-tabled-with-hover">

  <div class="card-header mb-2">
    <div class="row justify-content-end">
      <p class="col titulo">Veja as empresas</p>
      @if (auth()->user()->cargo == 1 || auth()->user()->cargo == 2)
        <a href="/empresa/create" class="botaoCadastro"><button class="btn btn-primary btn-round ml-2 mr-2">Cadastrar uma empresa</button></a>
      @endif
    </div>
  </div>

  @if(isset($_GET['erro']))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">Você só pode remover empresas que não estejam atreladas a nenhum contrato.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    @endif

  <div>
    <button class="bg-danger btn-round textoBranco" disabled>Vencido</button>
    <button class="bg-warning btn-round textoBranco" disabled>Irá vencer em 60 dias</button>
  </div>



  <div class="card-body">
    <table id="tabelaEmpresas" class="row-border compact tabelas">

      <thead>
        <tr>
          <th scope="col">Razão Social</th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col">Vencimento</th>
          <th scope="col">Numero do Convenio</th>
          <th scope="col">Quantidade de Alunos</th>
          <th scope="col">CNPJ</th>
          <th scope="col">Endereco</th>
          <th scope="col">Responsavel</th>
          <th scope="col">CPF</th>
          <th scope="col">Telefone</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody id="resultadoEmpresas">
        @foreach($empresas as $empresa)
        <tr class="
        <?php
        if ($empresa->vencimento == 0) { } else {

          $data = $empresa->vencimento;
          $ano = substr($data, 0, 4);
          $mes = substr($data, 5, 2);
          $dia = substr($data, 8, 2);

          $first = Carbon::create($ano, $mes, $dia);
          $now = Carbon::now(new DateTimeZone('America/Sao_Paulo'));
          $now30 = Carbon::now(new DateTimeZone('America/Sao_Paulo'));
          $now30->addMonth();
          $now30->addMonth();
          $diferenca = ($now->diffInDays($first) . PHP_EOL);
          $diferenca = intval($diferenca);

          if ($first->isPast()) {
            echo "bg-danger text-white";
          } elseif ($first->lessThanOrEqualTo($now30)) {
            echo "bg-warning text-white";
          }
        }
        ?> mesmaLinha">
          <td>{{$empresa->razao_social}}</td>
          @if (auth()->user()->cargo == 1 || auth()->user()->cargo == 2)
            <td>
              <form action="{{ url("/empresa/editar") }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="editar" value="{{$empresa->id}}">
                <button type="submit" class="iconeBotao"><img class="icone" src="{{ asset('images/icons8-edit-calendar-48.png') }}"></button>
              </form>
            </td>
            <td>
              <form action="{{ url("/empresa/esconder") }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="esconder" value="{{$empresa->id}}">
                <button type="submit" class="iconeBotao"><img class="icone" src="{{ asset('images/icons8-x-48.png') }}"></button>
              </form>
            </td>
            @else
              <td></td>
              <td></td>
            @endif
          <?php
          if ($empresa->vencimento == 0) {
            echo "<td>Vencimento não definido</td>";
          } else {
            $data = $empresa->vencimento;
            $ano = substr($data, 0, 4);
            $mes = substr($data, 5, 2);
            $dia = substr($data, 8, 2);

            $vencimento = $dia . "/" . $mes . "/" . $ano;

            echo "<td>{$vencimento}</td>";
          }

          ?>
          <td>{{$empresa->numero_convenio}}</td>
          <td>{{$empresa->quantidade_alunos}}</td>
          <?php
          if ($empresa->cnpj == null) {
            echo "<td></td>";
          } else {
            echo "<td>{$empresa->cnpj}</td>";
          }
          ?>
          <td>{{$empresa->endereco}}</td>
          <td>{{$empresa->responsavel}}</td>
          <?php
          if ($empresa->cpf == null) {
            echo "<td></td>";
          } else {
            echo "<td>{$empresa->cpf}</td>";
          }
          ?>
          <td>{{$empresa->telefone}}</td>
          <td>{{$empresa->email}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection