@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pacientes <a href="paciente/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('consultorio.paciente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombres</th>
					<th>Especie</th>
					<th>Raza</th>
					<th>Sexo</th>
					<th>Tamaño</th>
				
				
					<th>Cliente</th>
					<th>Teléfono</th>
					<th>Responsable</th>
            
					<th>Imagen</th>
					
					
					
				</thead>
               @foreach ($pacientes as $pac)
				<tr>
					<td>{{ $pac->id}}</td>
					<td>{{ $pac->nombres}}</td>
					<td>{{ $pac->especie}}</td>
					<td>{{ $pac->raza . " " . $pac->subclase}}</td>
					<td>{{ $pac->sexo}}</td>
					<td>{{ $pac->tamanio}}</td>
					<td>{{ $pac->apellido}}</td>
					<td>{{ $pac->telefono_numero}}</td>
					<td>{{ $pac->responsable}}</td>
				
				

					<td>
					<img src="{{asset('imagenes/pacientes/'.$pac->imagen)}}" alt="{{ $pac->nombres}}" height="100px" width="100px" class="img-thumbnail">
					</td>
					
					<td>
						<a title="Editar" href="{{URL::action('PacienteController@edit',$pac->id)}}"><button class="btn btn-primary">E</button></a>
                         <a title="Eliminar" href="" data-target="#modal-delete-{{$pac->id}}" data-toggle="modal"><button class="btn btn-danger">X</button></a>
					</td>
				</tr>
				@include('consultorio.paciente.modal')
				@endforeach
			</table>
		</div>
		<!--render es el metodo que pagina-->
		{{$pacientes->render()}}
	</div>
</div>

@endsection