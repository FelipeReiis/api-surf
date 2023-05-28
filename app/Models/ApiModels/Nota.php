<?php

namespace App\Models\ApiModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $fillable = [
        'onda',
        'notaParcial1',
        'notaParcial2',
        'notaParcial3'
    ];
}
