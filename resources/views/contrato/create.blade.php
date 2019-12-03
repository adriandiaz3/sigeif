@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Cadastrar um contrato
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cadastre um contrato</h4>
                </div>

                <div class="card-body">

                    <form action="{{ url("/contrato") }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="cadastro">Cadastro</label>
                                    <input type="date" name="cadastro" id="cadastro" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-8 pl-1">
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
                                    <label for="tipo_estagio">Tipo de Estágio</label>
                                    <select class="form-control" id="tipo_estagio" name="tipo_estagio" required>
                                        <option></option>
                                        <option value="1">Obrigatório</option>
                                        <option value="2">Não obrigatório</option>
                                        <option value="3">Jovem Aprendiz</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="inicial">Inicio</label>
                                    <input type="date" name="inicial" id="inicial" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="final">Final</label>
                                    <input type="date" name="final" id="final" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label for="termo_compromisso">Termo de compromisso</label>
                                    <input type="date" name="termo_compromisso" id="termo_compromisso" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="plano_estagio">Plano de estágio</label>
                                    <input type="date" name="plano_estagio" id="plano_estagio" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="aditivo">Aditivo</label>
                                    <input type="date" name="aditivo" id="aditivo" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label for="relatorio_atividades">Relatório de atividades</label>
                                    <input type="date" name="relatorio_atividades" id="relatorio_atividades" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="recisao_contrato">Rescisão do contrato</label>
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
                        <input type="hidden" name="estagiario_id" value="{{$estagiario->id}}">
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