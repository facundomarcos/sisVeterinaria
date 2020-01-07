<?php

namespace sisVeterinaria\Http\Controllers;

use Illuminate\Http\Request;

use sisVeterinaria\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use sisVeterinaria\Http\Requests\PacienteFormRequest;
use sisVeterinaria\Paciente;
use DB;

class PacienteController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $pacientes=DB::table('paciente as p')
            ->join('raza as r', 'p.raza','=','r.id')
            ->join('cliente as c', 'p.cliente','=','c.dni')
            ->join('especie as e', 'r.especie','=','e.nombre')
            ->select('p.id','p.nombres','e.nombre as especie','r.id as idraza','r.clase as raza','r.subclase as subclase','p.sexo','p.tamanio','p.peso','p.talla','p.cliente','c.dni', 'c.nombres as nombre_cliente','c.apellido','c.telefono_area','c.telefono_numero','c.correo', 'p.responsable','p.imagen','p.activo')
                ->where('p.nombres','LIKE','%'.$query.'%')
             ->where('p.activo','=','1')
                ->orwhere('c.apellido','LIKE','%'.$query.'%')
                ->where ('p.activo','=','1')
            ->orderBy('p.id','desc')
            ->paginate(6);
            return view('consultorio.paciente.index',["pacientes"=>$pacientes,"searchText"=>$query]);
        }
    }
    public function create()
    {
        //primero hay que declarar las variables que van a ir en los combos

   
        $razas=DB::table('raza as raz')
            ->select(DB::raw('CONCAT(raz.especie, " ", raz.clase, " ", raz.subclase) AS raza'),'raz.id')
            ->where('raz.activo','=','1')
            ->get();
        $clientes=DB::table('cliente')->where('activo','=','1')->get();
        //especies es lo que se manda en la vista y $especies es lo que se le estará enviando
        return view("consultorio.paciente.create",[ "razas"=>$razas, "clientes"=>$clientes]);

        //imagino que va tambien el cliente
   
    }
    public function store (PacienteFormRequest $request)
    {
        $paciente=new Paciente;
        $paciente->nombres=$request->get('nombres');
        $paciente->raza=$request->get('raza');
       
        $paciente->sexo=$request->get('sexo');
        $paciente->tamanio=$request->get('tamanio');
        $paciente->peso=$request->get('peso');
        $paciente->talla=$request->get('talla');
        $paciente->cliente=$request->get('cliente');
        $paciente->responsable=$request->get('responsable');

        $paciente->activo='1';

        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/pacientes/',$file->getClientOriginalName());
            $paciente->imagen=$file->getClientOriginalName();
        }

        $paciente->save();
        return Redirect::to('consultorio/paciente');

    }
    public function show($id)
    {
        return view("consultorio.paciente.show",["paciente"=>Paciente::findOrFail($id)]);
    }
    public function edit($id)
    {
        $paciente=Paciente::findOrFail($id);
        $especies=DB::table('especie')->where('activo','=','1')->get();
        $razas=DB::table('raza')->where('activo','=','1')->get();
        $clientes=DB::table('cliente')->where('activo','=','1')->get();
        return view("consultorio.paciente.edit",["paciente"=>$paciente,"especies"=>$especies, "razas"=>$razas, "clientes"=>$clientes ]);
    }
    public function update(PacienteFormRequest $request,$id)
    {
        $paciente=Paciente::findOrFail($id);

        $paciente->nombres=$request->get('nombres');
        $paciente->raza=$request->get('raza');
       
        $paciente->sexo=$request->get('sexo');
        $paciente->tamanio=$request->get('tamanio');
        $paciente->peso=$request->get('peso');
        $paciente->talla=$request->get('talla');
        $paciente->cliente=$request->get('cliente');
        $paciente->responsable=$request->get('responsable');

        $paciente->activo='1';

        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/pacientes/',$file->getClientOriginalName());
            $paciente->imagen=$file->getClientOriginalName();
        }

        $paciente->update();
        return Redirect::to('consultorio/paciente');
    }
    public function destroy($id)
    {
        $paciente=Paciente::findOrFail($id);
        $paciente->activo='0';
        $paciente->update();
        return Redirect::to('consultorio/paciente');
    }

}
