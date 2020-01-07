@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Turno</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'consultorio/turno','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			
				<div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label>Paciente</label>
					<select name='paciente' class="form-control">
						@foreach ($pacientes as $pac)
							<option value="{{$pac->id}}">{{$pac->nombres . " " . $pac->cliente}}</option>
						@endforeach
					</select>

				</div>
				</div>
		
            
            
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      	<div class="form-group">
            	<label for="fecha">Fecha: (AAA-MM-DD)</label>
            	<input type="text" name="fecha" class="form-control" placeholder="(AAA-MM-DD)">
            </div>
				</div>
            
                
                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      	<div class="form-group">
            	<label for="hora_inicio">Hora Inicio:</label>
            	<input type="time" name="hora_inicio" class="form-control" >
            </div>
				</div>
                
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      	<div class="form-group">
            	<label for="hora_finalizacion">Hora Fin: </label>
            	<input type="time" name="hora_finalizacion" class="form-control" >
            </div>
				</div>
                
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      	<div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" placeholder="Descripción ...">
            </div>
				</div>
				
           
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection