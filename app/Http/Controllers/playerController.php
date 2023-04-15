<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class playerController extends Controller
{
    public function show($id){
        //mostrar un plyr

        //en lugar de retornar el id, se debe retornar el objeto usuarios, cuando este la migración hecha
        return view('players/show' , compact($id));
    }

    public function create(){
        //crear un plyr
        return view('players/create');
    }
    
    public function store(){
        //guardar un plyr creado
    }
    public function edit($id){
        //editar un plyr

        //en lugar de retornar el id, se debe retornar el objeto usuarios, cuando este la migración hecha
        return view('players/edit', compact($id));
    }
    public function update(){
        //guardar un plyr editado
    }

    public function delete(){
        //borrar un plyr
    }
}
