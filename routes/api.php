<?php

use App\Http\Controllers\api\BateriaController;
use App\Http\Controllers\api\NotaController;
use App\Http\Controllers\api\OndaController;
use App\Http\Controllers\api\SurfistaController;
use Illuminate\Support\Facades\Route;

Route::get('/surfistas', [SurfistaController::class, 'index']);
Route::post('/inserir/surfista', [SurfistaController::class, 'store']);
Route::get('/baterias', [BateriaController::class, 'index']);
Route::post('/criar/bateria', [BateriaController::class, 'store']);
Route::get('/ondas', [OndaController::class, 'index']);
Route::post('/cadastrar/onda', [OndaController::class, 'store']);
Route::get('/notas', [NotaController::class, 'index']);
Route::post('/cadastrar/notas', [NotaController::class, 'store']);
Route::post('/bateria/vencedor', [NotaController::class, 'notaFinal']);
