@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Especies <a href="especie/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('configuracion.especie.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					
					<th>Opciones</th>
				</thead>
               @foreach ($especies as $esp)
				<tr>
					<td>{{ $esp->id}}</td>
					<td>{{ $esp->nombre}}</td>
					
					<td>
						<a title="Editar" href="{{URL::action('EspecieController@edit',$esp->id)}}"><button class="btn btn-primary">E</button></a>
                         <a title="Eliminar" href="" data-target="#modal-delete-{{$esp->id}}" data-toggle="modal"><button class="btn btn-danger">X</button></a>
					</td>
				</tr>
				@include('configuracion.especie.modal')
				@endforeach
			</table>
		</div>
		{{$especies->render()}}
	</div>
</div>

@endsection