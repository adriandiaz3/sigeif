@extends('layouts.app')

@section('titulo')
    Coordenadores
@endsection

@section('conteudo')
        <div class="mt-4 container">

            <div class="row">
              <h1 class="text-center mb-3 col-9">Veja os coordenadores</h1>
              <a href="/coordenador/create" class="col-3"><button class="btn btn-info">Cadastrar um coordenador</button></a>
            </div> 

            <table class="table table-sm">
                
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Curso</th>
                  <th scope="col">Email</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Coordenador do Estagio</th>
                </tr>
              </thead>
              @foreach($coordenadores as $coordenador)
              <tbody>
                <tr>
                  <th scope="row">{{$coordenador->nome}}</th>
                  <td>{{$coordenador->curso}}</td>
                  <td>{{$coordenador->email}}</td>
                  <td>{{$coordenador->telefone}}</td>
                  <td>{{$coordenador->coordenador_estagio}}</td>  
                  
                </tr>
                @endforeach 
              </tbody>
            </table>
            
            
    </div>
@endsection



