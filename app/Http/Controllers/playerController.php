<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Player;

class playerController extends Controller
{
    public function show($id){
        //mostrar un plyr
        $player = Player::findOrFail($id);
        return view('players.show', [
            'player' => $player
        ]);
    }

    public function create(){
        //crear un plyr
        return view('players.create');
    }
    
    public function store(Request $request){
        //guardar un plyr creado

        $validatedData = $request->validate([
            'name' => 'required|max:50|unique:players',
            'desc' => 'nullable|max:500',
            'numero' => 'nullable|integer',
            'avatar' => 'image|mimes:jpg,png|dimensions:max_width=2000,max_height=2000',
            'posicion1' => 'required',
            'posicion2' => 'nullable|different:posicion1',
            'posicion3' => 'nullable|different:posicion1,posicion2',
            'posicion4' => 'nullable|different:posicion1,posicion2,posicion3',
            'skill' => 'nullable|integer|min:0|max:100',
            'diestro' => 'boolean',
            'zurdo' => 'boolean',
            'goals' => 'nullable|integer',
            'assists' => 'nullable|integer',
            'shutout' => 'nullable|integer',
            'amountGames' => 'nullable|integer'
        ]);

        //filtra que no haya valores iguales
        $posiciones = collect([
            $request->posicion1,
            $request->posicion2,
            $request->posicion3,
            $request->posicion4,
        ])->filter(); // eliminar valores nulos
    
        if ($posiciones->unique()->count() != $posiciones->count()) {
            return redirect()->back()->withErrors(['posicion2' => 'Las posiciones no pueden ser iguales.']);
        }

        $player = new Player;
        $player->name = $validatedData['name'];
        $player->desc = $validatedData['desc'];
        $player->numero = $validatedData['numero'];
        
        // Guardar imagen del avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = 'player_' . $player->name . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('avatars/custom/' . $filename);
            Image::make($avatar->getRealPath())->resize(500, 500)->save($path);
            $player->avatar = 'avatars/custom/' . $filename;
        }
        
        
        

        $player->posicion1 = $validatedData['posicion1'];
        if ($request->filled('posicion2')) {
            $player->posicion2 = $validatedData['posicion2'];
        }
        if ($request->filled('posicion3')) {
            $player->posicion3 = $validatedData['posicion3'];
        }
        if ($request->filled('posicion4')) {
            $player->posicion4 = $validatedData['posicion4'];
        }
        $player->skill = $validatedData['skill'];
        if($request->filled('diestro')){
            $player->diestro = $validatedData['diestro'];
        }
        if($request->filled('zurdo')){
            $player->zurdo = $validatedData['zurdo'];
        }
        $player->goals = is_null($validatedData['goals']) ? 0 : $validatedData['goals'];
        $player->assists = is_null($validatedData['assists']) ? 0 : $validatedData['assists'];
        $player->shutout = is_null($validatedData['shutout']) ? 0 : $validatedData['shutout'];
        $player->amountGames = $validatedData['amountGames'];
        $player->save();

        // Redireccionar a la página del jugador
        return redirect()->route('players.show', $player->id);

        
    }
    public function edit($id){
        //editar un plyr
        $player = new Player;
        $player::find($id);
        //en lugar de retornar el id, se debe retornar el objeto usuarios, cuando este la migración hecha
        return view('players/edit', compact($player));
    }
    public function update(){
        //guardar un plyr editado
        $player = new Player;
    }

    public function delete(){
        //borrar un plyr
        $player = new Player;
    }
}
