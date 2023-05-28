<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiModels\Surfista;
class SurfistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Surfista::all();
    }
    
    public function store(Request $request)
    {
        Surfista::create($request->all());
        return response()->json(['response'=>"Surfista cadastrado com sucesso!."]);
    }


}
