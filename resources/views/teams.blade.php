@extends('layouts.layouts')

@section('content')

@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div class="sidebar_teams">
    <!-- Sidebar -->
    <aside class="sidebar__sidebar_teams">
        <h1> Equipo 1 </h1> 
        <p> Promedio nivel: {{$team1_prom}} </p>
        <div class="card-layout">
            @if(!is_null($team1))

            <div class="posicion_teams" style="width: 100%; ; text-align:center">
                <p> Arquero </p>
                <div class="card-container">
                    <a href="{{ route('players.show', $team1[0]->id) }}">
                        <div class="card-layout__item__teams">
                            <div class="card-layout__header">
                                <h3>{{ $team1[0]->name }}</h3>
                                <p>Position: {{ $team1[0]->posicion1 }}</p>
                                <p>Skill: {{ $team1[0]->skill }}</p>
                            </div>
                            <div class="card-layout__image" style="background-image: url({{ asset(($team1[0]->avatar ?? 'avatars/default/defaultImage.png')) }})">
                            </div>
                            <div class="card-layout__footer">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="posicion_teams" style="width: 100%; ; text-align:center">
                <p> Defensores: </p>
                @foreach ($team1 as $player)
                @if($player->posicion1 == "DEFENSOR")
                <div class="card-container">
                    <a href="{{ route('players.show', $player->id) }}">
                        <div class="card-layout__item__teams">
                            <div class="card-layout__header">
                                <h3>{{ $player->name }}</h3>
                                <p>Position: {{ $player->posicion1 }}</p>
                                <p>Skill: {{ $player->skill }}</p>
                            </div>
                            <div class="card-layout__image" style="background-image: url({{ asset(($player->avatar ?? 'avatars/default/defaultImage.png')) }})">
                            </div>
                            <div class="card-layout__footer">
                            </div>
                        </div>
                    </a>
                </div>
                    @endif
                @endforeach
            </div>

            <div class="posicion_teams" style="width: 100%; ; text-align:center">
                <p> Mediocampistas </p>
                @foreach ($team1 as $player)
                @if($player->posicion1 == "MEDIOCAMPISTA")
                <div class="card-container">
                    <a href="{{ route('players.show', $player->id) }}">
                        <div class="card-layout__item__teams">
                            <div class="card-layout__header">
                                <h3>{{ $player->name }}</h3>
                                <p>Position: {{ $player->posicion1 }}</p>
                                <p>Skill: {{ $player->skill }}</p>
                            </div>
                            <div class="card-layout__image" style="background-image: url({{ asset(($player->avatar ?? 'avatars/default/defaultImage.png')) }})">
                            </div>
                            <div class="card-layout__footer">
                            </div>
                        </div>
                    </a>
                </div>
                    @endif
                @endforeach
            </div>

            <div class="posicion_teams" style="width: 100%; ; text-align:center">
                <p> Delanteros: </p>
                @foreach ($team1 as $player)
                @if($player->posicion1 == "DELANTERO")
                <div class="card-container">
                    <a href="{{ route('players.show', $player->id) }}">
                        <div class="card-layout__item__teams">
                            <div class="card-layout__header">
                                <h3>{{ $player->name }}</h3>
                                <p>Position: {{ $player->posicion1 }}</p>
                                <p>Skill: {{ $player->skill }}</p>
                            </div>
                            <div class="card-layout__image" style="background-image: url({{ asset(($player->avatar ?? 'avatars/default/defaultImage.png')) }})">
                            </div>
                            <div class="card-layout__footer">
                            </div>
                        </div>
                    </a>
                </div>
                    @endif
                @endforeach
            </div>

            @else
            <p>No players found.</p>
            @endif
        </div>
    </aside>

<!-- Main -->
<main class="sidebar__main_teams">
        <h1>Equipo 2 </h1>
        <p> Promedio nivel: {{$team2_prom}} </p>
        <div class="card-layout">
            @if(!is_null($team2))

            <div class="posicion_teams" style="width: 100%; ; text-align:center">
                <p> Arquero </p>
                <div class="card-container">
                    <a href="{{ route('players.show', $team2[0]->id) }}">
                        <div class="card-layout__item__teams">
                            <div class="card-layout__header">
                                <h3>{{ $team2[0]->name }}</h3>
                                <p>Position: {{ $team2[0]->posicion1 }}</p>
                                <p>Skill: {{ $team2[0]->skill }}</p>
                            </div>
                            <div class="card-layout__image" style="background-image: url({{ asset(($team2[0]->avatar ?? 'avatars/default/defaultImage.png')) }})">
                            </div>
                            <div class="card-layout__footer">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="posicion_teams" style="width: 100%; ; text-align:center">
                <p> Defensores: </p>
                @foreach ($team2 as $player)
                @if($player->posicion1 == "DEFENSOR")
                <div class="card-container">
                    <a href="{{ route('players.show', $player->id) }}">
                        <div class="card-layout__item__teams">
                            <div class="card-layout__header">
                                <h3>{{ $player->name }}</h3>
                                <p>Position: {{ $player->posicion1 }}</p>
                                <p>Skill: {{ $player->skill }}</p>
                            </div>
                            <div class="card-layout__image" style="background-image: url({{ asset(($player->avatar ?? 'avatars/default/defaultImage.png')) }})">
                            </div>
                            <div class="card-layout__footer">
                            </div>
                        </div>
                    </a>
                </div>
                    @endif
                @endforeach
            </div>

            <div class="posicion_teams" style="width: 100%; ; text-align:center">
                <p> Mediocampistas </p>
                @foreach ($team2 as $player)
                @if($player->posicion1 == "MEDIOCAMPISTA")
                <div class="card-container">
                    <a href="{{ route('players.show', $player->id) }}">
                        <div class="card-layout__item__teams">
                            <div class="card-layout__header">
                                <h3>{{ $player->name }}</h3>
                                <p>Position: {{ $player->posicion1 }}</p>
                                <p>Skill: {{ $player->skill }}</p>
                            </div>
                            <div class="card-layout__image" style="background-image: url({{ asset(($player->avatar ?? 'avatars/default/defaultImage.png')) }})">
                            </div>
                            <div class="card-layout__footer">
                            </div>
                        </div>
                    </a>
                </div>
                    @endif
                @endforeach
            </div>

            <div class="posicion_teams" style="width: 100%; ; text-align:center">
                <p> Delanteros: </p>
                @foreach ($team2 as $player)
                @if($player->posicion1 == "DELANTERO")
                <div class="card-container">
                    <a href="{{ route('players.show', $player->id) }}">
                        <div class="card-layout__item__teams">
                            <div class="card-layout__header">
                                <h3>{{ $player->name }}</h3>
                                <p>Position: {{ $player->posicion1 }}</p>
                                <p>Skill: {{ $player->skill }}</p>
                            </div>
                            <div class="card-layout__image" style="background-image: url({{ asset(($player->avatar ?? 'avatars/default/defaultImage.png')) }})">
                            </div>
                            <div class="card-layout__footer">
                            </div>
                        </div>
                    </a>
                </div>
                    @endif
                @endforeach
            </div>

            @else
            <p>No players found.</p>
            @endif
        </div>
    </main>
</div>

@endsection