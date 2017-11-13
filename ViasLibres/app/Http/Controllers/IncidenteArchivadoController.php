<?php

namespace ViasLibres\Http\Controllers;

use Illuminate\Http\Request;

use ViasLibres\Http\Requests;
use Illuminate\Support\Facades\Input;
//use ViasLibres\User;
use Illuminate\Support\Facades\Redirect;
use ViasLibres\Http\Requests\IncidenteFormRequest;
use ViasLibres\Incidente;
use DB;
class IncidenteArchivadoController extends Controller
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
            ->where('i.incident_status','=','1')
    		->orderBy('i.id','desc')
    		->paginate(7);
    		return view('administracion.archivados.index',["incidentes"=>$incidentes,"searchText"=>$query]);
    	}
    }
	public function destroy($id){
		$incidente=DB::table('incident')->where('id','=',$id)->delete();
        return Redirect::to('administracion/archivados');
	}
}
