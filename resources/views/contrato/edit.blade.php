@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Editar contrato
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edite um contrato</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url("/contrato/atualizar") }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="cadastro">Cadastro</label>
                                    <input type="date" name="cadastro" id="cadastro" value="{{$contrato->cadastro}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-8 pl-1">
                                <div class="form-group">
                                    <label for="empresa">Empresa</label>
                                    <select class="form-control" id="empresa" name="empresa" required>
                                        <option></option>
                                        @foreach($empresas as $empresa)
                                        <option value="{{$empresa->id}}"
                                            @if($empresa->id == $contrato->empresa) {
                                                selected
                                            @endif>{{$empresa->razao_social}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="tipo_estagio">Tipo de Estagagio</label>
                                    <select class="form-control" onchange="myFunction()" id="tipo_estagio" name="tipo_estagio" required>
                                        <option></option>
                                        <option value="1" @if(1 == $contrato->tipo_estagio)
                                                                selected
                                                            @endif>Obrigatorio</option>
                                        <option value="2" @if(2 == $contrato->tipo_estagio)
                                                                selected
                                                            @endif>Não obrigatorio</option>
                                        <option value="3" @if(3 == $contrato->tipo_estagio)
                                                                selected
                                                            @endif>Jovem Aprendiz</option>
                                        <option value="4" @if(4 == $contrato->tipo_estagio)
                                                                selected
                                                            @endif>CNPq</option>
                                        <option value="5" @if(5 == $contrato->tipo_estagio)
                                                                selected
                                                            @endif>Estágio Externo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="inicial">Inicio</label>
                                    <input type="date" name="inicial" id="inicial" value="{{$contrato->inicial}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="final">Final</label>
                                    <input type="date" name="final" id="final" value="{{$contrato->final}}" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label for="termo_compromisso">Termo de compromisso</label>
                                    <input type="date" name="termo_compromisso" id="termo_compromisso" value="{{$contrato->termo_compromisso}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="plano_estagio">Plano de estagio</label>
                                    <input type="date" name="plano_estagio" id="plano_estagio" value="{{$contrato->plano_estagio}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="aditivo">Aditivo</label>
                                    <input type="date" name="aditivo" id="aditivo" value="{{$contrato->aditivo}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label for="relatorio_atividades">Relatorio de atividades</label>
                                    <input type="date" name="relatorio_atividades" id="relatorio_atividades" value="{{$contrato->relatorio_atividades}}" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="recisao_contrato">Rescisão do contrato</label>
                                    <input type="date" name="recisao_contrato" id="recisao_contrato" value="{{$contrato->recisao_contrato}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="situacao">Situação</label>
                                    <select class="form-control" onchange="myFunction()" id="situacao" name="situacao" required>
                                        <option></option>
                                        <option value="1" @if(1 == $contrato->situacao)
                                                                selected
                                                            @endif>Ativo</option>
                                        <option value="2" @if(2 == $contrato->situacao)
                                                                selected
                                                            @endif>Arquivado</option>
                                        <option value="3" @if(3 == $contrato->situacao)
                                                                selected
                                                            @endif>Finalizado</option>
                                        <option value="4" @if(4 == $contrato->situacao)
                                                                selected
                                                            @endif>Em espera</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="observacao">Observação</label>
                                    <input type="text" name="observacao" id="observacao" placeholder="Obs" value="{{$contrato->observacao}}" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$contrato->contrato_id}}">
                        <button type="submit" class="btn btn-info btn-fill pull-right">Atualizar</button>
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