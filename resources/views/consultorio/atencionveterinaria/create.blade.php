@extends ('layouts.admin') 
@section ('contenido') 
<div class="row"> 
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
        <h3>Nueva Atención</h3> 
        @if (count($errors)>0) 
        <div class="alert alert-danger"> 
            <ul> 
                @foreach ($errors->all() as $error) 
                <li>
                    {{$error}}
                </li> 
                @endforeach 
            </ul> 
        </div> 
        @endif 
    </div> 
</div> 
{!!Form::open(array('url'=>'consultorio/atencionveterinaria','method'=>'POST','autocomplete'=>'off'))!!} 
{{Form::token()}} 
<div class="row"> 
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
        <div class="form-group"> 
            <label for="nombre">Paciente</label> 
            <select name="paciente" id="paciente" class="form-control selectpicker" data-live-search="true"> 
                @foreach($pacientes as $paciente) 
                <option value="{{$paciente->id}}">
                    {{$paciente->nombres . " " . $paciente->cliente}}
                </option> 
                @endforeach 
            </select> 
        </div> 
    </div> 
     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
        <div class="form-group"> 
            <label for="nombre">Veterinario</label> 
            <select name="veterinario" id="veterinario" class="form-control selectpicker" data-live-search="true"> 
                @foreach($veterinarios as $veterinario) 
                <option value="{{$veterinario->dni}}">
                    {{$veterinario->apellido . " " . $veterinario->nombres}}
                </option> 
                @endforeach 
            </select> 
        </div> 
    </div> 
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
        <div class="form-group"> 
            <label>Descripción</label> 
           <input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="Descripción..."> 
        </div> 
    </div> 
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
        <div class="form-group"> 
            <label for="diagnostico">Diagnóstico</label> 
            <input type="textarea" name="diagnostico" value="{{old('diagnostico')}}" class="form-control" placeholder="Diagnóstico.."> 
        </div> 
    </div> 
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
        <div class="form-group"> 
            <label for="tratamiento">Tratamiento</label> 
            <input type="text" name="tratamiento" required value="{{old('tratamiento')}}" class="form-control" placeholder="Tratamiento.."> 
        </div> 
    </div> 
   
   
</div> 
     <div class="form-group"> 
           
        <button class="btn btn-primary" type="submit">Guardar</button> 
        <button class="btn btn-danger" type="reset">Cancelar</button> 
    </div> 

{!!Form::close()!!} 

@endsection