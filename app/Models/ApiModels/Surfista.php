<?php

namespace App\Models\ApiModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surfista extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'pais'
    ];
}
