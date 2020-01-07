<?php

namespace sisVeterinaria\Http\Controllers;

use Illuminate\Http\Request;

use sisVeterinaria\Http\Requests;
use sisVeterinaria\Especie;
use Illuminate\Support\Facades\Redirect;
use sisVeterinaria\Http\Requests\EspecieFormRequest;
use DB;

class EspecieController extends Controller
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
            $especies=DB::table('especie')->where('nombre','LIKE','%'.$query.'%')
            ->where ('activo','=','1')
            ->orderBy('id','asc')
            ->paginate(10);
            return view('configuracion.especie.index',["especies"=>$especies,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("configuracion.especie.create");
    }
    public function store (EspecieFormRequest $request)
    {
        $especie=new Especie;
        $especie->nombre=$request->get('nombre');
       
        $especie->activo='1';
        $especie->save();
        return Redirect::to('configuracion/especie');

    }
    public function show($id)
    {
        return view("configuracion.especie.show",["especie"=>Especie::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("configuracion.especie.edit",["especie"=>Especie::findOrFail($id)]);
    }
    public function update(EspecieFormRequest $request,$id)
    {
        $especie=Especie::findOrFail($id);
        $especie->nombre=$request->get('nombre');
       
        $especie->update();
        return Redirect::to('configuracion/especie');
    }
    public function destroy($id)
    {
        $especie=Especie::findOrFail($id);
        $especie->activo='0';
        $especie->update();
        return Redirect::to('configuracion/especie');
    }
}
