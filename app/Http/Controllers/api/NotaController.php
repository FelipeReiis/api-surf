<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiModels\Nota;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    public function index(){
        $query = DB::select('select "notaParcial1",  "notaParcial2", "notaParcial3", ondas.surfista, surfistas.nome, ondas.bateria  from notas join ondas on ondas.id = notas.onda
        join surfistas on ondas.surfista = surfistas.id
        order by surfista');
        return $query;
    }
    public function store(Request $request){
        if(!is_numeric($request->onda))
            return response()->json(['response'=>'Escolha a onda informando o número correspondente a ela ex: 1,2,3...'],406);
        elseif(count($request->all()) <= 3)
            return response()->json(['response'=>'É necessário escolher 1 onda existente e fornecer 3 notas parcias, para avaliar'],406);
        elseif(count($request->all()) > 4)
            return response()->json(['response'=>'São no minimo 3 e no máximo 3 notas parcias, para avaliar uma onda'],406);

        $query = DB::table('ondas')
                    ->select('id')
                    ->where('id',$request->onda)
                    ->count();
        if($query > 0 && $request->notaParcial1 && $request->notaParcial1 && $request->notaParcial1){
            Nota::create($request->all());
            return response()->json(['response'=>'Notas cadastradas com sucesso'],200);
        }
        else
            return response()->json(['response'=>'A onda informada não existe'],200);
    }

    public function notaFinal(Request $request){
        $query = DB::select('select ("notaParcial1" +  "notaParcial2" + "notaParcial3") / 3 as total, ondas.surfista, surfistas.nome from notas join ondas on ondas.id = notas.onda
        join surfistas on ondas.surfista = surfistas.id
        where bateria = 1
        order by surfista');
        $notasSurfista1 = [2];
        $notasSurfista2 = [2];
        foreach($query as $q => $k){
            if($query[0]->surfista == $k->surfista){
                array_push($notasSurfista1, $k->total);
                $surfistaNome1 = $k->nome;
            }
            else{
                array_push($notasSurfista2, $k->total);
                $surfistaNome2 = $k->nome;
            }
        }
        arsort($notasSurfista1);
        arsort($notasSurfista2);
        $notaFinalSurfista1 = (float)$notasSurfista1[0] + (float)$notasSurfista1[1];
        $notaFinalSurfista2 = (float)$notasSurfista2[0] + (float)$notasSurfista2[1];
        if( $notaFinalSurfista1 > $notaFinalSurfista2)
            return response()->json(['vencedor'=> 'O Vencedor da bateria '.$request->bateria. ' foi '. $surfistaNome1.' com a nota final de '.$notaFinalSurfista1], 200);
        else
             return response()->json(['vencedor'=> 'O Vencedor da bateria '.$request->bateria. ' foi '.$surfistaNome2.' com a nota final de '.$notaFinalSurfista2], 200);
    }
}
