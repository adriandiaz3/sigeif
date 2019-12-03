@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Cadastrar estagiário
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cadastre um estagiário</h4>
                </div>

                @if( isset($errors) && count($errors) > 0 )
                        @foreach( $errors->all() as $error )
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{$error}}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        @endforeach
                @endif

                <div class="card-body">

                    <form action="{{ url("/estagiario") }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h3>Dados do aluno</h3>
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="number" name="cpf" id="cpf" placeholder="25501480964" min="0" max="99999999999" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label for="nascimento">Data de Nascimento</label>
                                    <input type="date" name="nascimento" id="nascimento" class="form-control required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="google@gmail.com" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" name="telefone" id="telefone" placeholder="4134256988" class="form-control required">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="matricula">Matrícula</label>
                                    <input type="number" name="matricula" id="matricula" placeholder="20163029917" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="curso">Curso</label>
                                    <select class="form-control" id="curso" name="curso" required>
                                        <option></option>
                                        @foreach($cursos as $curso)
                                        <option value="{{$curso->id}}">{{$curso->curso}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h3>Dados do contrato</h3>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="cadastro">Cadastro</label>
                                    <input type="date" name="cadastro" id="cadastro" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="tipo_estagio">Tipo de Estágio</label>
                                    <select class="form-control" id="tipo_estagio" name="tipo_estagio" required>
                                        <option></option>
                                        <option value="1">Obrigatório</option>
                                        <option value="2">Não obrigatório</option>
                                        <option value="3">Jovem Aprendiz</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="empresa">Empresa</label>
                                    <select class="form-control" id="empresa" name="empresa" required>
                                        <option></option>
                                        @foreach($empresas as $empresa)
                                        <option value="{{$empresa->id}}">{{$empresa->razao_social}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="inicial">Inicio</label>
                                    <input type="date" name="inicial" id="inicial" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="final">Final</label>
                                    <input type="date" name="final" id="final" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="termo_compromisso">Termo de compromisso</label>
                                    <input type="date" name="termo_compromisso" id="termo_compromisso" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="plano_estagio">Plano de estágio</label>
                                    <input type="date" name="plano_estagio" id="plano_estagio" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="aditivo">Aditivo</label>
                                    <input type="date" name="aditivo" id="aditivo" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="relatorio_atividades">Relatório de atividades</label>
                                    <input type="date" name="relatorio_atividades" id="relatorio_atividades" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="recisao_contrato">Recisão do contrato</label>
                                    <input type="date" name="recisao_contrato" id="recisao_contrato" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="situacao">Situação</label>
                                    <select class="form-control" onchange="myFunction()" id="situacao" name="situacao" required>
                                        <option></option>
                                        <option value="1">Ativo</option>
                                        <option value="2">Arquivado</option>
                                        <option value="3">Finalizado</option>
                                        <option value="4">Em espera</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="observacao">Observação</label>
                                    <input type="text" name="observacao" id="observacao" placeholder="Obs" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function myFunction() {
        var opcao = document.getElementById("situacao").value;
        var $SL = $('#situacao');
        if (opcao == 1) {
            $SL.addClass('bg-info');
            $SL.removeClass('bg-success');
            $SL.removeClass('bg-danger');
            $SL.removeClass('bg-warning');
        } else if (opcao == 2) {
            $SL.addClass('bg-warning');
            $SL.removeClass('bg-success');
            $SL.removeClass('bg-danger');
            $SL.removeClass('bg-info');
        } else if (opcao == 3) {
            $SL.addClass('bg-success');
            $SL.removeClass('bg-warning');
            $SL.removeClass('bg-danger');
            $SL.removeClass('bg-info');
        }else if (opcao == 4) {
            $SL.addClass('bg-danger');
            $SL.removeClass('bg-success');
            $SL.removeClass('bg-warning');
            $SL.removeClass('bg-info');
        }
    }
</script>
@endsection