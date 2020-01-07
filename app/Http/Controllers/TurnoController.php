<?php

namespace sisVeterinaria\Http\Controllers;

use Illuminate\Http\Request;

use sisVeterinaria\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use sisVeterinaria\Http\Requests\TurnoFormRequest;
use sisVeterinaria\Turno;

use DB;

//para la fecha y la hora
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class TurnoController extends Controller
{
          public function __construct()
    {
//para que se deba iniciar sesion 
        $this->middleware('auth');
    }
    
      public function index(Request $request)
    {
        if ($request)
        {
          
            $query=trim($request->get('searchText'));
            $turno=DB::table('turno as t')
            ->join('paciente as p', 't.paciente','=','p.id')
                ->join('cliente as c', 'p.cliente', '=', 'c.dni')
                ->join('raza as r', 'p.raza', '=', 'r.id')
                
     ->select('t.id','t.fecha','t.hora_inicio','t.hora_finalizacion','t.descripcion','p.id as pacid','p.nombres', 'p.cliente', 'r.clase as raza', 'r.subclase', 'r.especie', 'c.nombres as duenio', 'c.apellido as duenioape')
            ->where('t.fecha','LIKE','%'.$query.'%')
                ->where('t.estado','=','1')
                ->orwhere('p.nombres','LIKE','%'.$query.'%')
                ->where ('t.estado','=','1')
            ->orderBy('t.fecha','desc')
            ->paginate(12);
            return view('consultorio.turno.index',["turno"=>$turno,"searchText"=>$query]);
        }
    }
     public function create()
    {
        $pacientes=DB::table('paciente')->where('activo','=','1')->get();
       
        return view("consultorio.turno.create",["pacientes"=>$pacientes]);
        
    }
     public function store (TurnoFormRequest $request)
    {

               $turno=new Turno;
       
            
            $turno->paciente=$request->get('paciente');
            $turno->fecha=$request->get('fecha');
            $turno->hora_inicio=$request->get('hora_inicio');
            $turno->hora_finalizacion=$request->get('hora_finalizacion');
            $turno->descripcion=$request->get('descripcion');
            $turno->estado='1';
         
               $turno->save();
       

        return Redirect::to('consultorio/turno');
    }
    
     public function edit($id)
    {
        $turno=Turno::findOrFail($id);
        $pacientes=DB::table('paciente')->where('activo','=','1')->get();
        return view("consultorio.turno.edit",["turno"=>$turno, "pacientes"=>$pacientes]);
    }
    public function update(TurnoFormRequest $request,$id)
    {
        $turno=Turno::findOrFail($id);
        $turno->paciente=$request->get('paciente');
        $turno->fecha=$request->get('fecha');
        $turno->hora_inicio=$request->get('hora_inicio');
        $turno->hora_finalizacion=$request->get('hora_finalizacion');
        $turno->descripcion=$request->get('descripcion');
        
        $turno->update();
        return Redirect::to('consultorio/turno');
    }
    
    
    
    
    
    
     public function destroy($id)
     {
        $turno=Turno::findOrFail($id);
        $turno->estado='0';
        $turno->update();
        return Redirect::to('consultorio/turno');
    }
}
