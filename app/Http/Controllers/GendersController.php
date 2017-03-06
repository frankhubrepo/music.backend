<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gender;
use App\Http\Requests\GendersRequest;

class GendersController extends Controller{
	
    public function index(){
    	$genders = Gender::all();
		return response()->json($genders);
    }

    public function show($id){
    	$gender = Gender::find($id);

    	if(is_null($gender))
    		return response()->json("Registro no encontrado", 404);
    	else
    		return response()->json($gender);
    }

    public function store(GendersRequest $request){
    	$gender = new Gender($request->all());
    	$gender->save();
    	return response()->json($gender);
    }

    public function update(GendersRequest $request, $id){
        $gender = Gender::find($id);

        if(is_null($gender))
            return response()->json("Registro no encontrado", 404);
        else
            $gender->update($request->all());
            return response()->json($gender);
    }

    public function destroy($id){
        $gender = Gender::find($id);

        if(is_null($gender)){
            return respone()->json('Registro no encontrado', 404);
        }
        else{
            $gender->delete();
            return response()->json("Registro eliminado satisfactoriamente");
        }
    }
}
