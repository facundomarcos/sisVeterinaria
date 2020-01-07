@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Atención: {{$atencionveterinaria->descripcion}}</h3>
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
			{!!Form::model($atencionveterinaria,['method'=>'PATCH','route'=>['consultorio.atencionveterinaria.update',$atencionveterinaria->id]])!!}
            {{Form::token()}}
<div class="row"> 
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
        <div class="form-group"> 
            <label for="nombre">Paciente</label> 
            <select name="paciente" id="paciente" class="form-control selectpicker" data-live-search="true"> 
                @foreach($pacientes as $pac) 
                @if($pac->id==$atencionveterinaria->paciente)
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
    
     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
        <div class="form-group"> 
            <label for="nombre">Veterinario</label> 
            <select name="veterinario" id="veterinario" class="form-control selectpicker" data-live-search="true"> 
                @foreach($veterinarios as $vet) 
                @if($vet->dni==$atencionveterinaria->veterinario)
                <option value="{{$vet->dni}}" selected>
                    {{$vet->nombres . " " . $vet->apellido}}
                </option> 
                @else
                <option value="{{$vet->dni}}">
                    {{$vet->nombres . " " . $vet->apellido}}
                </option> 
                @endif
                @endforeach 
            </select> 
        </div> 
    </div> 
    
 
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
        <div class="form-group"> 
            <label>Descripción</label> 
           <input type="text" name="descripcion" value="{{$atencionveterinaria->descripcion}}" class="form-control"> 
        </div> 
    </div> 
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
        <div class="form-group"> 
            <label for="diagnostico">Diagnóstico</label> 
            <input type="textarea" name="diagnostico" value="{{$atencionveterinaria->diagnostico}}" class="form-control"> 
        </div> 
    </div> 
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
        <div class="form-group"> 
            <label for="tratamiento">Tratamiento</label> 
            <input type="text" name="tratamiento" required value="{{$atencionveterinaria->tratamiento}}" class="form-control"> 
        </div> 
    </div> 
   
   
</div> 
     <div class="form-group"> 
           
        <button class="btn btn-primary" type="submit">Guardar</button> 
        <button class="btn btn-danger" type="reset">Cancelar</button> 
    </div> 


			{!!Form::close()!!}		
            
	
@endsection