<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiModels\Onda;
use Illuminate\Support\Facades\DB;

class OndaController extends Controller
{
    public function index(){
        return Onda::all();
    }
    public function store(Request $request){
        if($request->all() > 2)
            return response()->json(['response'=> 'Só pode existir 1 surfista e 1 bateria por onda'],406);
        elseif($request->all() < 2)
            return response()->json(['response'=> 'É necessário 1 surfista e 1 bateria por onda'],406);
        $surfista = DB::table('baterias')
            ->where('surfista1', $request->surfista)
            ->orWhere('surfista2',$request->surfista)
            ->count();
        $bateria = DB::table('baterias')
                    ->where('id', $request->bateria)
                    ->count();
        if ($surfista > 0 && $bateria > 0){
            Onda::create($request->all());
            return response()->json(['response'=> 'Onda cadastrada com sucesso!'], 200);
        }
        elseif ($surfista == 0 && $bateria == 0 )
            return response()->json(['response'=> 'bateria inexistente,surfista não cadastrado na bateria ou inexistente'], 404);
        elseif($surfista == 0)
            return response()->json(['response'=> 'surfista não existe ou não pertence a bateria, tente novamente com um surfista correspondente a bateria escolhida'], 404);
        else
            return response()->json(['response'=> 'bateria inexistente'], 404);

    }
}
