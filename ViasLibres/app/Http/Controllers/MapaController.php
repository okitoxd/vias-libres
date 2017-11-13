<?php

namespace ViasLibres\Http\Controllers;

use Illuminate\Http\Request;

use ViasLibres\Http\Requests;
use Illuminate\Support\Facades\Input;
//use ViasLibres\User;
use Illuminate\Support\Facades\Redirect;
use Cornford\Googlmapper\Facades\MapperFacade;
use Illuminate\Support\Facades\Route;
use ViasLibres\Http\Requests\IncidenteFormRequest;
use ViasLibres\Incidente;
use DB;


class MapaController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
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

    public function show($id)
    {

                $incidentes=DB::table('incident')
                ->select('id','description','incident_status','user_id','long_location','lat_location')
                ->where('id','=',$id)
                ->first();

                $detalles=DB::table('incident as i')
                ->join('incident_status as ic','ic.id','=','i.incident_status')
                ->select('i.id','i.description','ic.name','i.user_id','i.long_location','i.lat_location','i.imagen')
                ->where('i.id','=',$id)
                ->groupBy('i.id','i.description','ic.name','i.user_id','i.long_location','i.lat_location','i.imagen')
                ->get();

                return view("administracion.mapa.show",["incidentes"=>$incidentes,"detalles"=>$detalles]);
    }
	/*public function maps(){
    	return view('ver_mapa');
    }*/
}
