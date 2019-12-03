@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Editar estagiário
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edite um estagiário</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url("/estagiario/atualizar") }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" id="nome" placeholder="Nome" value="{{$estagiario->nome}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="number" name="cpf" id="cpf" placeholder="25501480964" min="0" max="99999999999" value="{{$estagiario->cpf}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label for="nascimento">Data de Nascimento</label>
                                    <input type="date" name="nascimento" id="nascimento" value="{{$estagiario->nascimento}}" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="google@gmail.com" value="{{$estagiario->email}}" class="form-control required">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="number" name="telefone" id="telefone" placeholder="4134256988" value="{{$estagiario->telefone}}" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="curso">Curso</label>
                                    <select class="form-control" id="curso" name="curso" required>
                                        <option></option>
                                        @foreach($cursos as $curso)
                                        <option value="{{$curso->id}}" @if($curso->id == $estagiario->curso)
                                                                            selected
                                                                        @endif>{{$curso->curso}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="matricula">Matrícula</label>
                                    <input type="number" name="matricula" id="matricula" placeholder="20163029917" value="{{$estagiario->matricula}}" class="form-control required">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$estagiario->id}}">
                        <button type="submit" class="btn btn-info btn-fill pull-right">Atualizar</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection