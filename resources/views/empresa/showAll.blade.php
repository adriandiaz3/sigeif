@extends('layouts.app')

@section('titulo')
    Empresa
@endsection

@section('conteudo')
        <div class="mt-4 container">

            <div class="row">
              <h1 class="text-center mb-3 col-9">Veja as empresas</h1>
              <a href="/empresa/create" class="col-3"><button class="btn btn-info">Cadastrar uma empresa</button></a>
            </div> 

            <table id="tabela_empresas" class="table table-sm">
                
              <thead>
                <tr>
                  <th scope="col">Vencimento</th>
                  <th scope="col">Numero do Convenio</th>
                  <th scope="col">Quantidade de Alunos</th>
                  <th scope="col">Razão Social</th>
                  <th scope="col">CNPJ</th>
                </tr>
              </thead>
              @foreach($empresas as $empresa)
              <tbody>
                <tr>
                  <th  scope="row">{{$empresa->vencimento}}</th>
                  <td>{{$empresa->numero_convenio}}</td>
                  <td>{{$empresa->quantidade_alunos}}</td>
                  <td>{{$empresa->razao_social}}</td>
                  <td>{{$empresa->cnpj}}</td>  
                  
                </tr>
                @endforeach 
              </tbody>
            </table>
            
            
    </div>

@endsection



