<?php

namespace sisVeterinaria\Http\Controllers;

use Illuminate\Http\Request;

use sisVeterinaria\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVeterinaria\Http\Requests\AtencionVeterinariaFormRequest;
use sisVeterinaria\AtencionVeterinaria;

use DB;

//para la fecha y la hora
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class AtencionVeterinariaController extends Controller
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
            $atencionveterinaria=DB::table('atencionv as av')
            ->join('paciente as p', 'av.paciente','=','p.id')
            ->join('veterinario as v', 'av.veterinario','=','v.dni')
                ->join('cliente as c', 'p.cliente', '=', 'c.dni')
     ->select('av.id','av.fecha_hora','av.descripcion','p.id as pacid','p.nombres', 'p.cliente','c.nombres as duenio', 'c.apellido as duenioape','v.dni','v.apellido', 'v.nombres as nombrevet','av.diagnostico','av.tratamiento')
            ->where('p.nombres','LIKE','%'.$query.'%')
            ->orderBy('av.fecha_hora','desc')
            ->paginate(7);
            return view('consultorio.atencionveterinaria.index',["atencionveterinaria"=>$atencionveterinaria,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $pacientes=DB::table('paciente')->where('activo','=','1')->get();
       
        //para crear una lista de pacientes que se pueden traer
      $veterinarios=DB::table('veterinario')->get();
        //trae la lista de veterinarios
        return view("consultorio.atencionveterinaria.create",["pacientes"=>$pacientes,"veterinarios"=>$veterinarios]);
        
    }
    //funcion para almacenar
    public function store (AtencionVeterinariaFormRequest $request)
    {

               $atencionveterinaria=new AtencionVeterinaria;
              // $atencionveterinaria->fecha_hora=$request->get('fecha_hora');
            
            $atencionveterinaria->descripcion=$request->get('descripcion');
            $atencionveterinaria->paciente=$request->get('paciente');
            $atencionveterinaria->veterinario=$request->get('veterinario');
            $atencionveterinaria->diagnostico=$request->get('diagnostico');
            $atencionveterinaria->tratamiento=$request->get('tratamiento');
            
               $mytime = Carbon::now('America/Argentina/Buenos_Aires');
               $atencionveterinaria->fecha_hora=$mytime->toDateTimeString();
               
               $atencionveterinaria->save();
       

        return Redirect::to('consultorio/atencionveterinaria');
    }

    public function show($id)
    {
    
            return view('consultorio.atencionveterinaria.show',["atencionveterinaria"=>$atencionveterinaria::findOrFail($id)]);
   
    }

      public function edit($id)
    {
          $atencionveterinaria=AtencionVeterinaria::findOrFail($id);
        $veterinarios=DB::table('veterinario')->get();
        $pacientes=DB::table('paciente')->get();
          
        return view("consultorio.atencionveterinaria.edit",["atencionveterinaria"=>$atencionveterinaria, "veterinarios"=>$veterinarios , "pacientes"=>$pacientes]);
          
          
    }
    
    public function update(AtencionVeterinariaFormRequest $request, $id)
    {
        
               $atencionveterinaria= AtencionVeterinaria::findOrFail($id);
              // $atencionveterinaria->fecha_hora=$request->get('fecha_hora');
            
            $atencionveterinaria->descripcion=$request->get('descripcion');
            $atencionveterinaria->paciente=$request->get('paciente');
            $atencionveterinaria->veterinario=$request->get('veterinario');
            $atencionveterinaria->diagnostico=$request->get('diagnostico');
            $atencionveterinaria->tratamiento=$request->get('tratamiento');
            
               $mytime = Carbon::now('America/Argentina/Buenos_Aires');
               $atencionveterinaria->fecha_hora=$mytime->toDateTimeString();
               
               $atencionveterinaria->update();
   

        return Redirect::to('consultorio/atencionveterinaria');
    }
    
   
    
    public function destroy($id)
    {
        $atencionveterinaria=Atencionveterinaria::findOrFail($id);
       
        $atencionveterinaria->delete();
        return Redirect::to('consultorio/atencionveterinaria');
    }
}
