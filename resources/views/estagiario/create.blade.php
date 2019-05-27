@extends('layouts.app')

@section('titulo')
   Cadastrando um estagiario
@endsection

@section('conteudo')
        <div class="mt-4 container">

            <h1 class="text-center mb-3">Cadastre um novo estagiario</h1>

            <form action="{{ url("/estagiario") }}" method="POST">
            {{ csrf_field() }}
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Cadastro</label>
                    <div class="col-sm-10">
                        <input type="number" name="cadastro" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" class="form-control required">
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
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Data de Nascimento</label>
                    <div class="col-sm-10">
                        <input type="date" name="nascimento" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">CPF</label>
                    <div class="col-sm-10">
                        <input type="number" name="cpf" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Matricula</label>
                    <div class="col-sm-10">
                        <input type="number" name="matricula" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Tipo de Estagio</label>
                    <div class="col-sm-10">
                        <input type="text" name="tipo_estagio" class="form-control required">
                    </div>  
                </div>

                <div class="form-group row">
                    <label id="dia" class="col-sm-2 col-form-label">Curso</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="dia" name="curso" required>
                            @foreach($cursos as $curso)
                                <option value="{{$curso->id}}">{{$curso->curso}}</option>
                            @endforeach     
                        </select>       
                    </div>
                </div>

                <div class="form-group row">
                    <label id="ok" class="col-sm-2 col-form-label">Endereço</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ok" name="endereco" required>
                            @foreach($empresas as $empresa)
                                <option value="{{$empresa->id}}">{{$empresa->endereco}}</option>
                            @endforeach     
                        </select>       
                    </div>
                </div>

                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Inicio</label>
                    <div class="col-sm-10">
                        <input type="date" name="inicial" class="form-control required">
                    </div>  
                </div>

                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Final</label>
                    <div class="col-sm-10">
                        <input type="date" name="final" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Termo de compromisso(???)</label>
                    <div class="col-sm-10">
                        <input type="text" name="termo_compromisso" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Plano de estagio(???)</label>
                    <div class="col-sm-10">
                        <input type="text" name="plano_estagio" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Aditivo(???)</label>
                    <div class="col-sm-10">
                        <input type="text" name="aditivo" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Relatorio de atividades(???)</label>
                    <div class="col-sm-10">
                        <input type="text" name="relatorio_atividades" class="form-control required">
                    </div>  
                </div>
                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Recisão do contrato(???)</label>
                    <div class="col-sm-10">
                        <input type="text" name="recisao_contrato" class="form-control required">
                    </div>  
                </div>

                <div class="form-group row">
                    <label id="meu" class="col-sm-2 col-form-label">Situação</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="meu" name="situacao" required>
                            <option value="1">Arquivado</option>
                            <option value="2">Ativo</option>
                            <option value="3">Finalizado</option>
                        </select>       
                    </div>
                </div>

                <div class="form-group row">
                    <label id="descricao"  class="col-sm-2 col-form-label">Observação</label>
                    <div class="col-sm-10">
                        <input type="text" name="observacao" class="form-control required">
                    </div>  
                </div>
                <button type="submit" class="btn btn-primary">SALVAR</button>
            </form>    
    </div>
@endsection
