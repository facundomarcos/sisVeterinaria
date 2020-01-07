@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Paciente: {{ $paciente->nombres}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::model($paciente,['method'=>'PATCH','route'=>['consultorio.paciente.update',$paciente->id],'files'=>'true'])!!}
            {{Form::token()}}
			<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Nombres</label>
            		<input type="text" name="nombres" required value="{{$paciente->nombres}}" class="form-control">
            	</div>
			</div>
			<!--por aca tiene que ir la especie-->
			
			<!-- -->
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label>Raza</label>
					<select name='raza' class="form-control">
						@foreach ($razas as $raz)
						@if ($raz->id==$paciente->raza)
							<option value="{{$raz->id}}" selected>{{$raz->especie . " " . $raz->clase . " " . $raz->subclase}}</option>
						@else
							<option value="{{$raz->id}}" >{{$raz->especie . " " . $raz->clase . " " . $raz->subclase}}</option>
						@endif
						@endforeach
					</select>

				</div>
			</div>
		
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Sexo</label>
            		<input type="text" name="sexo" required value="{{$paciente->sexo}}" class="form-control" >
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Tamaño</label>
            		<input type="text" name="tamanio" required value="{{$paciente->tamanio}}" class="form-control">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Peso</label>
            		<input type="number" name="peso" value="{{$paciente->peso}}" class="form-control" >
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Talla</label>
            		<input type="number" name="talla" required value="{{$paciente->talla}}" class="form-control" >
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label>cliente</label>
					<select name='cliente' class="form-control">
						@foreach ($clientes as $cli)
							<option value="{{$cli->dni}}">{{$cli->apellido}}</option>
						@endforeach
					</select>

				</div>
			</div>





			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Responsable</label>
            		<input type="text" name="responsable" required value="{{$paciente->responsable}}" class="form-control">
            	</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="imagen">Imagen</label>
            		<input type="file" name="imagen" class="form-control">
					@if (($paciente->imagen)!="")
						<img src="{{asset('imagenes/pacientes/'.$paciente->imagen)}}" height="300px" width="300px">
					@endif
            	</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
            		<button class="btn btn-primary" type="submit">Guardar</button>
            		<button class="btn btn-danger" type="reset">Cancelar</button>
            	</div>
			</div>
		</div>


			{!!Form::close()!!}		
            
	
@endsection