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
            'pierna' => [],
            'id' => []
        ];
        $playersIds = $players->pluck('id')->mapWithKeys(function ($id) {
            return [$id => false];
        })->toArray();
        return view('home', compact('players', 'checkbox' , 'playersIds'));
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
            'skill' => [],
            'id' => $request->input('playercheck') ?? $request->input('playercheck') 
        ];
        $id = $request->input('playercheck');
        $playersIds = $players->pluck('id')->mapWithKeys(function ($id) {
            return [$id => false];
        })->toArray();
        if(!is_null($checkbox['id'])){
            $checkbox['id'] = array_combine($id, array_fill(0, count($id), true));
        }
        foreach ($playersIds as $key => $value) {
            if (isset($checkbox['id'][$key])) {
                $playersIds[$key] = true;
            }
        }
        
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

        return view('home', compact('players' , 'checkbox', 'playersIds'));
    }

    public function mixTeams(Request $request){
        $ids = $request->input('playercheck2');
        if(is_null($ids)){
            return redirect()->route('home.index')->with('status', 'Debes seleccionar jugadores para crear un partido');
        }
        $numPlayers = count($ids);
        $cancha = $request->input('cancha');
        if($cancha * 2 > $numPlayers){
            return redirect()->back()->with('status', 'Faltan ' . $cancha * 2 - $numPlayers . ' jugadores para armar equipos de un futbol ' . $cancha);
        }
        if($cancha * 2 < $numPlayers){
            return redirect()->back()->with('status', 'Faltan ' . $cancha * 2 - $numPlayers . ' jugadores para armar equipos de un futbol ' . $cancha);
        }

        $players = [];
        

        foreach($ids as $id) {
            $player = Player::find($id);
            if($player) {
                $players[] = $player;
            }
        }
        $arqueros = [];
        foreach($players as $key => $player){
            if($player->posicion1 == "ARQUERO"){
                $arqueros[] = $player;
                unset($players[$key]);
            }
        }
        if(count($arqueros)>2){
            return redirect()->back()->with('status', 'Sobran ' . count($arqueros) -2  . ' arqueros');
        }
        if(count($arqueros) < 2){
            foreach($players as $key => $player){
                if($player->posicion2 == "ARQUERO"){
                    if(count($arqueros) < 2){
                        $arqueros[] = $player;
                        unset($players[$key]);
                    }
                }
            }
        }
        if(count($arqueros) < 2){
            foreach($players as $key => $player){
                if($player->posicion3 == "ARQUERO"){
                    if(count($arqueros) < 2){
                        $arqueros[] = $player;
                        unset($players[$key]);
                    }
                }
            }
        }
        if(count($arqueros) < 2){
            foreach($players as $key => $player){
                if($player->posicion4 == "ARQUERO"){
                    if(count($arqueros) < 2){
                        $arqueros[] = $player;
                        unset($players[$key]);
                    }
                }
            }
        }
        if(count($arqueros)<2){
            return redirect()->back()->with('status', 'Falta ' . 2 - count($arqueros)  . ' arqueros para armar el equipo');
        }

        $team1 = [];
        $team2 = [];

        $team1_media = 0;
        $team2_media = 0;

        //asigna arquero
        $team1[] = $arqueros[0];
        $team1_media += $arqueros[0]->skill;
        $team2[] = $arqueros[1];
        $team2_media += $arqueros[1]->skill;

        //burbujeo
        $players = array_filter($players); //elimina espacios nulos
        $players = array_values($players); //reindexa los espacios
        for ($i = 0; $i < count($players) - 1; $i++) {
            for ($j = 0; $j < count($players) - $i - 1; $j++) {
                if ($players[$j]->skill < $players[$j + 1]->skill) {
                    $temp = $players[$j];
                    $players[$j] = $players[$j + 1];
                    $players[$j + 1] = $temp;
                }
            }
        }

        if($team1_media < $team2_media){
            foreach($players as $key => $player) {
                if($key % 2 == 0) {
                    $team1[] = $player;
                    $team1_media += $player->skill;
                } else {
                    $team2[] = $player;
                    $team2_media += $player->skill;
                }
            }
        }else{
            foreach($players as $key => $player) {
                if($key % 2 == 0) {
                    $team2[] = $player;
                    $team2_media += $player->skill;
                } else {
                    $team1[] = $player;
                    $team1_media += $player->skill;
                }
            }
        }


        
        if(count($team1) == count($team2)){
            $team1_prom = $team1_media / $cancha;
            $team2_prom = $team2_media / $cancha;
            return view('teams', compact('team1' , 'team2' , 'team1_prom' , 'team2_prom'));
        }else{
            return redirect()->back()->with('status', 'error inesperado, los equipos no tienen el mismo tamaño');
        }
    }

    
}
