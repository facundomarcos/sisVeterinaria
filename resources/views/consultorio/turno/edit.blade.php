@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Turno: </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($turno,['method'=>'PATCH','route'=>['consultorio.turno.update',$turno->id]])!!}
            {{Form::token()}}
           
            <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label>Paciente</label>
					<select name="paciente" id="paciente" class="form-control selectpicker" data-live-search="true"> 
                @foreach($pacientes as $pac) 
                @if($pac->id==$turno->paciente)
                <option value="{{$pac->id}}" selected>
                    {{$pac->nombres . " " . $pac->cliente}}
                </option> 
                @else
                <option value="{{$pac->id}}">
                    {{$pac->nombres . " " . $pac->cliente}}
                </option> 
                @endif
                @endforeach 
            </select> 
				</div>
				</div>
		
            
            
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      	<div class="form-group">
            	<label for="fecha">Fecha: (AAA-MM-DD)</label>
            	<input type="text" name="fecha" class="form-control" value="{{$turno->fecha}}">
            </div>
				</div>
            
                
                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      	<div class="form-group">
            	<label for="hora_inicio">Hora Inicio: (NN:NN)</label>
            	<input type="time" name="hora_inicio" class="form-control" value="{{$turno->hora_inicio}}">
            </div>
				</div>
                
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      	<div class="form-group">
            	<label for="hora_finalizacion">Hora Fin: (NN:NN)</label>
            	<input type="time" name="hora_finalizacion" class="form-control" value="{{$turno->hora_finalizacion}}">
            </div>
				</div>
                
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      	<div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$turno->descripcion}}">
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