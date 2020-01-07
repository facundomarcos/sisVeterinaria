<?php

namespace sisVeterinaria\Http\Controllers;

use Illuminate\Http\Request;

use sisVeterinaria\Http\Requests;
use sisVeterinaria\Raza;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVeterinaria\Http\Requests\RazaFormRequest;
use DB;

class RazaController extends Controller
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
            $razas=DB::table('raza as r')
            ->join('especie as e', 'r.especie','=','e.nombre')
            ->select('r.id','r.clase','r.subclase','e.nombre', 'r.activo')
             ->where('r.clase','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(10);
            return view('configuracion.raza.index',["razas"=>$razas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $especies=DB::table('especie')->where('activo','=','1')->get();
        return view("configuracion.raza.create",["especies"=>$especies]);
    }
    public function store (RazaFormRequest $request)
    {
        $raza=new Raza;
        $raza->especie=$request->get('especie');
        $raza->clase=$request->get('clase');
        $raza->subclase=$request->get('subclase');
        $raza->activo='1';
        $raza->save();
        return Redirect::to('configuracion/raza');

    }
    public function show($id)
    {
        return view("configuracion.raza.show",["raza"=>Raza::findOrFail($id)]);
    }
    public function edit($id)
    {
        $raza=Raza::findOrFail($id);
        $especies=DB::table('especie')->where('activo','=','1')->get();
        return view("configuracion.raza.edit",["raza"=>$raza, "especies"=>$especies]);
    }
    public function update(RazaFormRequest $request,$id)
    {
        $raza=Raza::findOrFail($id);
        $raza->especie=$request->get('especie');
        $raza->clase=$request->get('clase');
        $raza->subclase=$request->get('subclase');
        
        $raza->update();
        return Redirect::to('configuracion/raza');
    }
    public function destroy($id)
    {
        $raza=Raza::findOrFail($id);
        $raza->activo='0';
        $raza->update();
        return Redirect::to('configuracion/raza');
    }
}