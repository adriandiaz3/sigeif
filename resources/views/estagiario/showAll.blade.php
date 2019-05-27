@extends('layouts.app')

@section('titulo')
    Estagiarios
@endsection

@section('conteudo')
        <div class="mt-4 container">
            <div class="row">
              <h1 class="text-center mb-3 col-9">Veja os estagiarios</h1>
              <a href="/estagiario/create" class="col-3"><button class="btn btn-info">Cadastrar um estagiario</button></a>
            </div> 
            <table class="table table-sm">
                
              <thead>
                <tr>
                  <th scope="col">Cadastro</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Curso</th>
                  <th scope="col">Endereco</th>
                  <th scope="col">Situacao</th>
                </tr>
              </thead>
              @foreach($estagiarios as $estagiario)
              <tbody>
                <tr>
                  <th scope="row">{{$estagiario->cadastro}}</th>
                  <td>{{$estagiario->nome}}</td>
                  <td>{{$estagiario->telefone}}</td>
                  <td>{{$estagiario->email}}</td>
                  @foreach($coordenadores as $curso)
                    <?php
                        if($curso->id == $estagiario->curso){
                            echo "<td>{$curso->curso}</td>";
                        }
                    ?>
                  @endforeach
                  @foreach($empresas as $empresa)
                    <?php
                        if($empresa->id == $estagiario->endereco){
                            echo "<td>{$empresa->endereco}</td>";
                        }
                    ?>
                  @endforeach

                <?php
                    if($estagiario->situacao == 1){
                        echo "<td class=\"bg-info\">Arquivado</td>";
                    }elseif ($estagiario->situacao == 2) {
                        echo "<td class=\"bg-success\">Ativo</td>";
                    }elseif ($estagiario->situacao == 3) {
                        echo "<td class=\"bg-danger\">Finalizado</td>";
                    }
                ?>  
                  
                </tr>
                @endforeach 
              </tbody>
            </table>
            
            
    </div>
@endsection





