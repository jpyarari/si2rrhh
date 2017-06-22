<?php

namespace rrhh\Http\Controllers;

use Illuminate\Http\Request;

use rrhh\Http\Requests;

use rrhh\Usuario;
use Illuminate\support\Facades\Redirect;
use rrhh\Http\Requests\UsuarioFormRequest;
use DB;


class UsuarioController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
    	if($request)
    	{
    		$busqueda = trim($request->get('searchText'));
    		$usuarios= DB::table('usuario')->where('nombre','LIKE','%'.$busqueda.'%')
            ->paginate(7);
    		return view('privilegios.usuario.index',["usuario"=>$usuarios,"searchText"=>$busqueda]);
    	}
    }
    public function create()
    {
    	return view("privilegios.usuario.create");
    }

    public function store(UsuarioFormRequest $request)
    {
    	$usuario=new Usuario;
    	$usuario->nombre=$request->get('nombre');
    	$usuario->clave=$request->get('clave');
    	$usuario->habilitado=true;
    	$usuario->save();
    	return Redirect::to('privilegios/usuario');	
    }

    public function show($cod)
    {
    	return view("privilegios.usuario.show",["usuario"=>Usuario::findOrFail($cod)]);
    }

    public function edit($cod)
    {
    	return view("privilegios.usuario.edit",["usuario"=>Usuario::findOrFail($cod)]);
    }

    public function update(UsuarioFormRequest $request,$cod)
    {
    	$usuario= Usuario::findOrFail($cod);
    	$usuario->nombre=$request->get('nombre');
    	$usuario->clave=$request->get('clave');

    	$usuario->update();
    	return Redirect::to('privilegios/usuario');
    		
    }

    public function destroy($cod)
    {
    	$usuario=Usuario::findOrFail($cod);
    	$usuario->habilitado=false;
    	$usuario->update();
    	return Redirect::to('privilegios/usuario');
    }

}
