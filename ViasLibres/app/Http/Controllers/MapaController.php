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
use ViasLibres\Http\Requests\ImagesFormRequest;
use ViasLibres\Incidente;
use ViasLibres\Images;
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
                ->select('id','description','incident_status','user_id','calificationA','calificationB','calificationC','long_location','lat_location')
                ->where('id','=',$id)
                ->first();

                $detalles=DB::table('incident as i')
                ->join('images as im','i.id','=','im.incident_id')
                ->select('i.id','i.description','i.incident_status','i.user_id','i.calificationA','i.calificationB','i.calificationC','i.long_location','i.lat_location','im.folder','im.name')
                ->where('i.id','=',$id)
                ->groupBy('i.id','i.description','i.incident_status','i.user_id','i.calificationA','i.calificationB','i.calificationC','i.long_location','i.lat_location','im.folder','im.name')
                ->get();

                return view("administracion.mapa.show",["incidentes"=>$incidentes,"detalles"=>$detalles]);
    }
	/*public function maps(){
    	return view('ver_mapa');
    }*/
}
