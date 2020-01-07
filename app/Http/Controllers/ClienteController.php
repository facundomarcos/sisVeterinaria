<?php

namespace sisVeterinaria\Http\Controllers;

use Illuminate\Http\Request;

use sisVeterinaria\Http\Requests;
use sisVeterinaria\Cliente;
use Illuminate\Support\Facades\Redirect;


use sisVeterinaria\Http\Requests\ClienteFormRequest;

use DB;


class ClienteController extends Controller
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
            $clientes=DB::table('cliente')
                ->where('apellido','LIKE','%'.$query.'%')
                ->where ('activo','=','1')
                ->orwhere('dni','LIKE','%'.$query.'%')
                ->where ('activo','=','1')
            ->orderBy('apellido','asc')
                //se puede agregar busqueda por dni
            ->paginate(10);
            return view('consultorio.cliente.index',["clientes"=>$clientes,"searchText"=>$query]);
        }
    }
    public function create()
    {
         $localidades=DB::table('localidad')->get();
        
        return view("consultorio.cliente.create",["localidades"=>$localidades]);
    }
  
    public function store (ClienteFormRequest $request)
    {
        $cliente=new Cliente;
        $cliente->dni=$request->get('dni');
        $cliente->nombres=$request->get('nombres');
        $cliente->apellido=$request->get('apellido');
        $cliente->localidad=$request->get('localidad');
        $cliente->calle=$request->get('calle');
        $cliente->altura=$request->get('altura');
        $cliente->telefono_area=$request->get('telefono_area');
        $cliente->telefono_numero=$request->get('telefono_numero');
        $cliente->correo=$request->get('correo');
        $cliente->comentarios=$request->get('comentarios');
        $cliente->activo='1';
        
        
        $cliente->save();
        return Redirect::to('consultorio/cliente');

    }
    public function show($dni)
    {
        return view("consultorio.cliente.show",["cliente"=>Cliente::findOrFail($dni)]);
    }
    public function edit($dni)
    {
        $cliente=Cliente::findOrFail($dni);
        $localidades=DB::table('localidad')->get();
        return view("consultorio.cliente.edit",["cliente"=>$cliente, "localidades"=>$localidades]);
    }
   
    
    
    public function update(ClienteFormRequest $request,$dni)
    {
        $cliente=Cliente::findOrFail($dni);
  
        $cliente->nombres=$request->get('nombres');
        $cliente->apellido=$request->get('apellido');
        $cliente->localidad=$request->get('localidad');
        $cliente->calle=$request->get('calle');
        $cliente->altura=$request->get('altura');
        $cliente->telefono_area=$request->get('telefono_area');
        $cliente->telefono_numero=$request->get('telefono_numero');
        $cliente->correo=$request->get('correo');
        $cliente->comentarios=$request->get('comentarios');
        $cliente->activo='1';
       
        $cliente->update();
        return Redirect::to('consultorio/cliente');
    }
    public function destroy($dni)
    {
        $cliente=Cliente::findOrFail($dni);
        $cliente->activo='0';
        $cliente->update();
        return Redirect::to('consultorio/cliente');
    }
     
            
    }
