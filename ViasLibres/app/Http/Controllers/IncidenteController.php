<?php

namespace ViasLibres\Http\Controllers;

use Illuminate\Http\Request;

use ViasLibres\Http\Requests;
use Illuminate\Support\Facades\Input;
//use ViasLibres\User;
use Illuminate\Support\Facades\Redirect;
use ViasLibres\Http\Requests\IncidenteFormRequest;
use DB;

class IncidenteController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }


    public function index(Request $request)
    {
    	if($request){
    		$query=trim($request->get('searchText'));
    		$incidentes=DB::table('incident')->where('description','LIKE','%'.$query.'%')
    		->orderBy('id','desc')
    		->paginate(7);
    		return view('administracion.incidentes.index',["incidentes"=>$incidentes,"searchText"=>$query]);
    		/*select('id','name','apellidoPer','dniPer','emailPer','imagenPer')->*/
    	}
    }

    //Aqui hacer funcion para el mapa , ademas crear una vista en administracio/incidentes/mapa
    //y ahi crear un metodo de busqueda definido para ello

    public function index2(Request $request)//El cuadrado de etexto que escogera
    {
        if($request){
            $query=trim($request->get('searchText'));
            $incidentes=DB::table('incident')->where('description','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('administracion.mapa.index',["incidentes"=>$incidentes,"searchText"=>$query]);
            /*select('id','name','apellidoPer','dniPer','emailPer','imagenPer')->*/
        }
    }


    public function destroy($id){
		$incidente=DB::table('incident')->where('id','=',$id)->delete();
		return Redirect::to('administracion/incidentes');
	}

	
}
