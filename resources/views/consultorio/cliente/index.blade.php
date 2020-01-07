@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('consultorio.cliente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>DNI</th>
					
					<th>Apellido</th>
                    <th>Nombres</th>
					<th>Localidad</th>
					<th>Calle</th>
				
					<th>Telefono </th>
					
					<th>Correo</th>
            
					<th>Comentarios</th>
					
					
					
				</thead>
               @foreach ($clientes as $cli)
				<tr>
					<td>{{ $cli->dni}}</td>
					
					<td>{{ $cli->apellido}}</td>
                    <td>{{ $cli->nombres}}</td>
					<td>{{ $cli->localidad}}</td>
					<td>{{ $cli->calle . " N°: " . $cli->altura}}</td>
				
					<td>{{ $cli->telefono_area . " - " . $cli->telefono_numero}}</td>
					<td>{{ $cli->correo}}</td>
					<td>{{ $cli->comentarios}}</td>
				
				

					
					
					<td>
						<a title="Editar" href="{{URL::action('ClienteController@edit',$cli->dni)}}"><button class="btn btn-primary">E</button></a>
                         <a title="Eliminar" href="" data-target="#modal-delete-{{$cli->dni}}" data-toggle="modal"><button class="btn btn-danger">X</button></a>
					</td>
				</tr>
				@include('consultorio.cliente.modal')
				@endforeach
			</table>
		</div>
		<!--render es el metodo que pagina-->
		{{$clientes->render()}}
	</div>
</div>

@endsection