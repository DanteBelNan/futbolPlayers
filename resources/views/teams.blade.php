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
        <p> Promedio nivel: {{$team1_prom}} </p>
        <div class="card-layout">
            @if(!is_null($team1))
            
            @foreach ($team1 as $player)
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
            
            @endforeach
            @else
            <p>No players found.</p>
            @endif
        </div>
    </aside>

<!-- Main -->
<main class="sidebar__main_teams">
    <p> Promedio nivel: {{$team2_prom}} </p>
        <div class="card-layout">
            @if(!is_null($team2))
            
            @foreach ($team2 as $player)
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
            
            @endforeach
            @else
            <p>No players found.</p>
            @endif
        </div>
    </main>
</div>

@endsection