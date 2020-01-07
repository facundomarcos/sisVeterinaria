@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Razas <a href="raza/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('configuracion.raza.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Especie</th>
					<th>Raza</th>
					<th>Sub Clase</th>
				</thead>
               @foreach ($razas as $raz)
				<tr>
					<td>{{ $raz->id}}</td>
					<td>{{ $raz->nombre}}</td>
					<td>{{ $raz->clase}}</td>
					<td>{{ $raz->subclase}}</td>
					<td>
						<a title="Editar" href="{{URL::action('RazaController@edit',$raz->id)}}"><button class="btn btn-primary">E</button></a>
                         <a title="Eliminar" href="" data-target="#modal-delete-{{$raz->id}}" data-toggle="modal"><button class="btn btn-danger">X</button></a>
					</td>
				</tr>
				@include('configuracion.raza.modal')
				@endforeach
			</table>
		</div>
		{{$razas->render()}}
	</div>
</div>

@endsection