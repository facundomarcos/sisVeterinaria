@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de turnos <a href="turno/create"><button class="btn btn-success">Nuevo</button></a>
       
        
        
        </h3>
        
		@include('consultorio.turno.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Paciente</th>
					<th>Dueño</th>
					<th>Fecha</th>
					<th>Hora Inicio</th>
					<th>Hora Finalización</th>
					<th>Descripción</th>
				</thead>
               @foreach ($turno as $tur)
				<tr>
					<td>{{ $tur->id}}</td>
					<td>{{ $tur->nombres . " - " . $tur->especie . " " . $tur->raza . " " . $tur->subclase}}</td>
					<td>{{ $tur->duenioape . " " . $tur->duenio}}</td>
					<td>{{ $tur->fecha}}</td>
					<td>{{ $tur->hora_inicio}}</td>
					<td>{{ $tur->hora_finalizacion}}</td>
					<td>{{ $tur->descripcion}}</td>
					<td>
						<a title="Editar" href="{{URL::action('TurnoController@edit',$tur->id)}}"><button class="btn btn-primary">E</button></a>
                         <a title="Eliminar" href="" data-target="#modal-delete-{{$tur->id}}" data-toggle="modal"><button class="btn btn-danger">X</button></a>
					</td>
				</tr>
				@include('consultorio.turno.modal')
				@endforeach
			</table>
		</div>
		{{$turno->render()}}
	</div>
</div>

@endsection