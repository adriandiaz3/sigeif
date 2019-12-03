@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Cadastrar empresa
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cadastre uma empresa</h4>
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
                    <form action="{{ url("/empresa") }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="vencimento">Vencimento</label>
                                    <input type="date" name="vencimento" id="vencimento" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="numero_convenio">Número do convênio</label>
                                    <input type="text" name="numero_convenio" id="numero_convenio" placeholder="Numero do convenio" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" name="telefone" id="telefone" placeholder="4134256089" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pr-1">
                                <div class="form-group">
                                    <label for="razao_social">Razão social</label>
                                    <input type="text" name="razao_social" id="razao_social" placeholder="Nome da empresa" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="cnpj">CNJP</label>
                                    <input type="number" name="cnpj" id="cnpj" placeholder="46678987000107" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-5 pl-1">
                                <div class="form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" name="endereco" id="endereco" placeholder="Rua Alberto Tavares" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="responsavel">Responsável</label>
                                    <input type="text" name="responsavel" id="responsavel" placeholder="Nome do responsavel" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="number" name="cpf" id="cpf" placeholder="25501480964" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="google@gmail.com" class="form-control required">
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
@endsection