@extends('light-bootstrap-dashboard::layouts.main')

@section('content-title')
Editar coordenador
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edite um coordenador</h4>
				</div>
				<div class="card-body">
					<form action="{{ url("/coordenador/atualizar") }}" method="POST">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-5 pr-1">
								<div class="form-group">
									<label for="nome">Nome</label>
									<input type="text" name="nome" id="nome" placeholder="Nome" value="{{$coordenador->nome}}" class="form-control required">
								</div>
							</div>
							<div class="col-md-3 px-1">
								<div class="form-group">
									<label for="curso">Curso</label>
									<input type="text" name="curso" id="curso" value="{{$coordenador->curso}}" placeholder="Nome do Curso" class="form-control required">
								</div>
							</div>
							<div class="col-md-4 pl-1">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" placeholder="Email" value="{{$coordenador->email}}" class="form-control required">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 pr-1">
								<div class="form-group">
									<label for="telefone">Telefone</label>
									<input type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{$coordenador->telefone}}" class="form-control required">
								</div>
							</div>
							
							<div class="col-md-6 pl-1">
								<div class="form-group">
									<label for="coordenador_estagio">Coordenador de</label>
									<select  class="form-control" name="coordenador_estagio" required>
										<option></option>
										<option value="Curso" <?php if ($coordenador->coordenador_estagio == "Curso") {
                                                                echo "selected";
                                                            } ?>>Curso</option>
                                        <option value="Estágio" <?php if ($coordenador->coordenador_estagio == "Estágio") {
                                                                echo "selected";
                                                            } ?>>Estágio</option>
									</select>			
								</div>
							</div>
						</div>
						<input type="hidden" name="id" value="{{$coordenador->id}}">
						<button type="submit" class="btn btn-info btn-fill pull-right">Atualizar</button>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection