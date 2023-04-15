<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    //Por defecto agarra la tabla players, pero si quisiese dejarlo fijado seria con
    //protected $table = "player";
}
