<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Player;

class homeController extends Controller
{
    public function index(){
        $players = Player::all();
        $checkbox = [
            'posiciones1' => [],
            'posiciones2' => [],
            'posiciones3' => [],
            'posiciones4' => [],
            'skill' => [],
            'pierna' => []
        ];
        return view('home', compact('players', 'checkbox'));
    }

    public function filters(Request $request){
        $players = Player::all();
        $checkbox = [
            'posiciones1' => $request->input('posiciones1') ? $request->input('posiciones1') : [],
            'posiciones2' => $request->input('posiciones2') ? $request->input('posiciones2') : [],
            'posiciones3' => $request->input('posiciones3') ? $request->input('posiciones3') : [],
            'posiciones4' => $request->input('posiciones4') ? $request->input('posiciones4') : [],
            'diestro' => $request->input('diestro')?? $request->input('diestro') ,
            'zurdo' => $request->input('zurdo') ?? $request->input('zurdo')  ,
            'skill' => []
        ];

        $posiciones1 = $request->input('posiciones1');
        $posiciones2 = $request->input('posiciones2');
        $posiciones3 = $request->input('posiciones3');
        $posiciones4 = $request->input('posiciones4');
        $diestro = $request->input('diestro');
        $zurdo = $request->input('zurdo');

        $search = $request->input('query');


        $players = DB::table('players')
        ->when($posiciones1, function ($query, $posiciones1){
            $query->whereIn('posicion1', $posiciones1);

        })
        ->when($posiciones2, function ($query, $posiciones2){
            $query->whereIn('posicion2', $posiciones2);

        })
        ->when($posiciones3, function ($query, $posiciones3){
            $query->whereIn('posicion3', $posiciones3);

        })
        ->when($posiciones4, function ($query, $posiciones4){
            $query->whereIn('posicion4', $posiciones4);

        })
        ->when($diestro, function ($query, $diestro){
            $query->where('diestro', $diestro);
        })
        ->when($zurdo, function ($query, $zurdo){
            $query->where('zurdo', $zurdo);
        })
        ->when($search, function ($query, $search){
            $query->where(function($query) use ($search){
                $query->where('name', 'like' ,'%' . $search . '%')
                ->orwhere('numero', 'like' ,'%' . $search . '%')
                ->orwhere('desc', 'like' ,'%' . $search . '%');
            });
        })
        ->get();

        return view('home', compact('players' , 'checkbox'));
    }

    public function mixTeams(Request $request){
        $ids = $request->input('player');

        if(is_null($ids)){
            return redirect()->route('home.index')->with('status', 'Debes seleccionar jugadores para crear un partido');
        }
        $numPlayers = count($ids);
        $cancha = $request->input('cancha');
        if($cancha * 2 > $numPlayers){
            return redirect()->route('home.index')->with('status', 'Faltan ' . $cancha * 2 - $numPlayers . 'jugadores para armar equipos de un futbol ' . $cancha);
        }
        if($cancha * 2 < $numPlayers){
            return redirect()->route('home.index')->with('status', 'Sobran ' . $numPlayers - $cancha * 2  . 'jugadores para armar equipos de un futbol ' . $cancha);
        }

        $players = [];

        foreach($ids as $id) {
            $player = Player::find($id);
            if($player) {
                $players[] = $player;
            }
        }

        $arqueros = [];
        foreach($players as $player){
            if($player->posicion1 == "ARQUERO" || $player->posicion2 == "ARQUERO" || $player->posicion3 == "ARQUERO" || $player->posicion4 == "ARQUERO"){
                $arqueros[] = $player;
            }
        }
        if(count($arqueros)==0){
            return redirect()->route('home.index')->with('status', 'Sobran ' . $numPlayers - $cancha * 2  . 'jugadores para armar equipos de un futbol ' . $cancha);
        }


        return view('teams', compact('players'));
    }

    
}
