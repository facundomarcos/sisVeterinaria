@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Atenciones<a href="atencionveterinaria/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('consultorio.atencionveterinaria.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
				
					<th>id</th>
					<th>Fecha</th>
					<th>Descripción</th>
					<th>Paciente</th>
					<th>Dueño</th>
					<th>Veterinario</th>
					<th>Diagnóstico</th>
					<th>Tratamiento</th>
					
				</thead>
               @foreach ($atencionveterinaria as $ate)
				<tr>
					
					<td>{{ $ate->id}}</td>
					<td>{{ $ate->fecha_hora}}</td>
					<td>{{ $ate->descripcion}}</td>
					<td>{{ $ate->nombres}}</td>
					<td>{{ $ate->duenio . " " . $ate->duenioape}}</td>
			
				
					<td>{{ $ate->nombrevet . " " . $ate->apellido}}</td>
					<td>{{ $ate->diagnostico}}</td>
					<td>{{ $ate->tratamiento}}</td>
				
					
					<td>
						<a title="Editar" href="{{URL::action('AtencionVeterinariaController@edit',$ate->id)}}"><button class="btn btn-primary ">E</button></a>
                        
                         <a title="Eliminar" href="" data-target="#modal-delete-{{$ate->id}}" data-toggle="modal"><button class="btn btn-danger">X</button></a>
					</td>
				</tr>
				@include('consultorio.atencionveterinaria.modal')
				@endforeach
			</table>
		</div>
		<!--render es el metodo que pagina-->
		{{$atencionveterinaria->render()}}
	</div>
</div>

@endsection