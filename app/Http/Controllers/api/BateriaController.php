<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiModels\Bateria;
use Illuminate\Support\Facades\DB;

class BateriaController extends Controller
{
    public function index(){

        return Bateria::all();

    }

    public function store(Request $request){
        if(count($request->all()) > 2 || count($request->all()) < 2)
            return response()->json(['response'=> 'São no minimo 2 e no máximo 2 surfistas por báteria'],406);
        $surfistas = DB::table('surfistas')
                    ->whereIn('id', [$request->surfista1, $request->surfista2])
                    ->count();
        if($surfistas == 2){
            Bateria::create($request->all());
            return response()->json(['response'=> 'surfistas inseridos na bateria com sucesso'],200);
        }
        else
            return response()->json(['response'=> 'Surfista não cadastrado'],404);
    }
}
