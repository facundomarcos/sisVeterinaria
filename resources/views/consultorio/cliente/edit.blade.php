@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{ $cliente->apellido . ", " . $cliente->nombres }}</h3>
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
			{!!Form::model($cliente,['method'=>'PATCH','route'=>['consultorio.cliente.update',$cliente->dni]])!!}
            {{Form::token()}}
			<div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">DNI</label>
            		<input type="text"  disabled name="dni" placeholder="{{($cliente->dni)}}" class="form-control">
            	</div>
			</div>
         
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Nombres</label>
            		<input type="text" name="nombres" required value="{{($cliente->nombres)}}" class="form-control">
            	</div>
			</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Apellido</label>
            		<input type="text" name="apellido" required value="{{($cliente->apellido)}}" class="form-control" placeholder="Apellido del cliente...">
            	</div>
			</div>
            
		
			
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label>Localidad</label>
					<select name='localidad' class="form-control">
						@foreach ($localidades as $loc)
							<option value="{{$loc->Localidad}}">{{$loc->Localidad}}</option>
						@endforeach
					</select>

				</div>
			</div>
                
                
                
                
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Calle</label>
            		<input type="text" name="calle" required value="{{($cliente->calle)}}" class="form-control" placeholder="Calle...">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Altura</label>
            		<input type="number" name="altura" required value="{{($cliente->altura)}}" class="form-control">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Telefono area</label>
            		<input type="number" name="telefono_area" value="{{($cliente->telefono_area)}}" class="form-control" >
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Telefono numero</label>
            		<input type="number" name="telefono_numero" required value="{{($cliente->telefono_numero)}}" class="form-control" >
            	</div>
			</div>

			


			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Correo</label>
            		<input type="email" name="correo" required value="{{($cliente->correo)}}" class="form-control" placeholder="correo...">
            	</div>
			</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="nombre">Comentarios</label>
            		<input type="text" name="comentarios" required value="{{($cliente->comentarios)}}" class="form-control" placeholder="comentarios...">
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