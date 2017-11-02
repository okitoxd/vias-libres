<?php

namespace ViasLibres\Http\Controllers;

use Illuminate\Http\Request;

use ViasLibres\Http\Requests;
use Cornford\Googlmapper\Facades\MapperFacade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;


class MapaController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function maps(){
    	return view('ver_mapa');
    }
}
