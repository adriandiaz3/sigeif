@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Editar empresa
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edite uma empresa</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url("/empresa/atualizar") }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="vencimento">Vencimento</label>
                                    <input type="date" name="vencimento" id="vencimento" value="{{$empresa->vencimento}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="numero_convenio">Número do convênio</label>
                                    <input type="text" name="numero_convenio" id="numero_convenio" value="{{$empresa->numero_convenio}}" placeholder="Numero do convenio" class="form-control required">
                                </div>
                            </div>

                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" name="telefone" id="telefone" value="{{$empresa->telefone}}" placeholder="4134256089" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label for="razao_social">Razão social</label>
                                    <input type="text" name="razao_social" id="razao_social" placeholder="Nome da empresa" value="{{$empresa->razao_social}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label for="cnpj">CNJP</label>
                                    <input type="number" name="cnpj" id="cnpj" min="0" max="99999999999999" placeholder="46678987000107" value="{{$empresa->cnpj}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" name="endereco" id="endereco" placeholder="Rua Alberto Tavares" value="{{$empresa->endereco}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-2 pl-1">
                                <div class="form-group">
                                    <label for="quantidade_alunos">Quantidade de Alunos</label>
                                    <input type="text" id="quantidade_alunos" disabled="disabled" value="{{$empresa->quantidade_alunos}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="responsavel">Responsável</label>
                                    <input type="text" name="responsavel" id="responsavel" placeholder="Nome do responsavel" value="{{$empresa->responsavel}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="number" name="cpf" id="cpf" placeholder="25501480964" min="0" max="99999999999" value="{{$empresa->cpf}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="google@gmail.com" value="{{$empresa->email}}" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$empresa->id}}">
                        <button type="submit" class="btn btn-info btn-fill pull-right">Atualizar</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection