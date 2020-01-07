@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Raza: {{ $raza->especie}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($raza,['method'=>'PATCH','route'=>['configuracion.raza.update',$raza->id]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="especie">Especie</label>
            	<input type="text" name="especie" class="form-control" value="{{$raza->especie}}" placeholder="especie...">
            </div>
            <div class="form-group">
            	<label for="clase">Clase</label>
            	<input type="text" name="clase" class="form-control" value="{{$raza->clase}}" placeholder="clase...">
            </div>
			<div class="form-group">
            	<label for="subclase">Sub Clase</label>
            	<input type="text" name="subclase" class="form-control" value="{{$raza->subclase}}" placeholder="subclase...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection