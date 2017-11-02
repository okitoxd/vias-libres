<?php

namespace ViasLibres\Http\Controllers;

use Illuminate\Http\Request;

use ViasLibres\Http\Requests;
use Illuminate\Support\Facades\Input;
use ViasLibres\User;
use Illuminate\Support\Facades\Redirect;
use ViasLibres\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if($request){
    		$query=trim($request->get('searchText'));
    		$usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')
    		->orderBy('id','desc')
    		->paginate(7);
    		return view('administracion.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
    		/*select('id','name','apellidoPer','dniPer','emailPer','imagenPer')->*/
    	}
    }

	public function create(){
		return view("administracion.usuario.create");
	}

	public function store(UsuarioFormRequest $request){
		$usuario=new User;
		$usuario->name=$request->get('name');
		$usuario->email=$request->get('email');
		$usuario->password=bcrypt($request->get('password'));
		$usuario->tipo=$request->get('tipo');
		if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/personas/',$file->getClientOriginalName());
            $usuario->imagen=$file->getClientOriginalName();
        }
        $usuario->save();
        return Redirect::to("administracion/usuario");
	}

	public function edit($id){
		return view("administracion.usuario.edit",["usuario"=>User::findOrFail($id)]);
	}

	public function update(UsuarioFormRequest $request,$id){
		$usuario=User::findOrFail($id);
		$usuario->name=$request->get('name');
		$usuario->email=$request->get('email');
		$usuario->password=bcrypt($request->get('password'));
		$usuario->tipo=$request->get('tipo');
		if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/personas/',$file->getClientOriginalName());
            $usuario->imagen=$file->getClientOriginalName();
        }
        $usuario->update();
        return Redirect::to("administracion/usuario");
	}

	public function destroy($id){
		$usuario=DB::table('users')->where('id','=',$id)->delete();
		return Redirect::to('administracion/usuario');
	}

}
