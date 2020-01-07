@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Raza</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'configuracion/raza','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			
				<div class="form-group">
					<label>Especie</label>
					<select name='especie' class="form-control">
						@foreach ($especies as $esp)
							<option value="{{$esp->nombre}}">{{$esp->nombre}}</option>
						@endforeach
					</select>

				</div>
			
            <div class="form-group">
            	<label for="clase">Clase</label>
            	<input type="text" name="clase" class="form-control" placeholder="Clase...">
            </div>
			<div class="form-group">
            	<label for="subclase">Sub Clase</label>
            	<input type="text" name="subclase" class="form-control" placeholder="Sub Clase...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection