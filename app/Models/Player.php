<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    //Por defecto agarra la tabla players, pero si quisiese dejarlo fijado seria con
    //protected $table = "player";
    protected $fillable = [
        'name',
        'desc',
        'numero',
        'posicion1',
        'posicion2',
        'posicion3',
        'posicion4',
        'skill',
        'diestro',
        'zurdo',
        'goals',
        'assists',
        'shutout',
        'amountGames',
    ];
}
