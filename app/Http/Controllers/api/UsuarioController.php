<?php

namespace ViasLibres\Http\Controllers\api;


use Illuminate\Http\Request;
use ViasLibres\Http\Controllers\Controller;
use ViasLibres\User;

class UsuarioController extends Controller
{

	public function create(Request $request){
    	if (User::create($request->all())) {
		return response()->json(['status'=>'ok'],200);
		}else{
		return response()->json(['status'=>'error'],404);
		}
    }

    public function delete($id){
    	$usuario=User::find($id);
    	if ($usuario) {
    		$usuario->delete();
    		return response()->json(['status'=>'ok'],200);
    	}else{
    		return response()->json(['status'=>'error , usuario no existe'],404);
    	}
    }

     public function edit(Request $request,$id){
    	$usuario=User::find($id);
    	if ($usuario) {
    		$usuario->update($request->all());
    		return response()->json(['status'=>'ok'],200);
    	}else{
    		return response()->json(['status'=>'error , usuario no existe'],404);
    	}
    }
}