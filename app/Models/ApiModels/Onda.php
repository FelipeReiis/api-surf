<?php

namespace App\Models\ApiModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onda extends Model
{
    use HasFactory;
    protected $fillable = [
        'bateria',
        'surfista'
    ];
}
