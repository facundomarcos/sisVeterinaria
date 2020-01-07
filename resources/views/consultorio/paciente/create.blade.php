@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Paciente</h3>
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
			{!!Form::open(array('url'=>'consultorio/paciente','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Nombres</label>
            		<input type="text" name="nombres" required value="{{old('nombres')}}" class="form-control" placeholder="Nombres del paciente...">
            	</div>
			</div>
		
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label>Raza</label>
					<select name='raza' class="form-control selectpicker" id="raza" data-live-search="true">
				
						@foreach ($razas as $raza)
							<option value="{{$raza->id}}">{{$raza->raza}}</option>
						@endforeach
					</select>

				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Sexo</label>
            		<input type="text" name="sexo" required value="{{old('sexo')}}" class="form-control" placeholder="Sexo...">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Tamaño</label>
            		<input type="text" name="tamanio" required value="{{old('tamanio')}}" class="form-control" placeholder="tamaño...">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Peso</label>
            		<input type="number" name="peso" value="{{old('peso')}}" class="form-control" >
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Talla</label>
            		<input type="number" name="talla" required value="{{old('talla')}}" class="form-control" >
            	</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label>Cliente</label>
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
            		<input type="text" name="responsable" required value="{{old('responsable')}}" class="form-control" placeholder="Responsable...">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="imagen">Imagen</label>
            		<input type="file" name="imagen" class="form-control">
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
            
@push ('scripts')
<script>

    
</script>
@endpush
	
@endsection