<?php

namespace App\Models\ApiModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bateria extends Model
{
    use HasFactory;
    protected $fillable = [
        'surfista1',
        'surfista2'
    ];
}
