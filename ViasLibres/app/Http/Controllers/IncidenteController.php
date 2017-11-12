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
    		$incidentes=DB::table('incident as i')
            ->join('incident_status as ic','ic.id','=','i.incident_status')
            ->select('i.id','i.description','ic.name','i.user_id','i.calificationA','i.calificationB','i.calificationC','i.long_location','i.lat_location','i.imagen')
            ->where('i.description','LIKE','%'.$query.'%')
    		->orderBy('i.id','desc')
    		->paginate(7);
    		return view('administracion.incidentes.index',["incidentes"=>$incidentes,"searchText"=>$query]);
    		/*select('id','name','apellidoPer','dniPer','emailPer','imagenPer')->*/
    	}
    }

    

    /*public function create(){
        $estado=DB::table('categoria')->where('condicion','=','1')->get();
        return view("administracion.incidente.create",["estado"=>$estado]);
    }

    
    public function store(IncidenteFormRequest $request){
        $articulo=new Articulo;
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';
        if (Input::hasFile('imagen')) {
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
        }
        $articulo->save();
        return Redirect::to('almacen/articulo');
    }*/

    public function destroy($id){
		$incidente=DB::table('incident')->where('id','=',$id)->delete();
		return Redirect::to('administracion/incidentes');
	}

	
}
