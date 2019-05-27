@extends('layouts.app')

@section('titulo')
    Cadastrando uma empresa
@endsection

@section('conteudo')
        <div class="mt-4 container">

            <h1 class="text-center mb-3">Cadastre uma empresa</h1>

            <form action="{{ url("/empresa") }}" method="POST">
            {{ csrf_field() }}
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Vencimento</label>
                    <div class="col-sm-10">
                        <input type="date" name="vencimento" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Numero do convenio</label>
                    <div class="col-sm-10">
                        <input type="number" name="numero_convenio" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Quantidade de Alunos na empresa</label>
                    <div class="col-sm-10">
                        <input type="number" name="quantidade_alunos" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Razao social(?)</label>
                    <div class="col-sm-10">
                        <input type="text" name="razao_social" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">CNJP</label>
                    <div class="col-sm-10">
                        <input type="number" name="cnpj" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-10">
                        <input type="text" name="endereco" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Responsavel</label>
                    <div class="col-sm-10">
                        <input type="text" name="responsavel" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">CPF</label>
                    <div class="col-sm-10">
                        <input type="number" name="cpf" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-10">
                        <input type="number" name="telefone" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control required">
                    </div>  
                </div>
                <button type="submit" class="btn btn-primary">SALVAR</button>
            </form>    
    </div>
@endsection
