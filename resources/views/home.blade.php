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

<div class="sidebar">
    <!-- Sidebar -->
    <aside class="sidebar__sidebar">
        <form method="GET" action="{{ route('players.create') }}">
            <button type="submit">Crear nuevo jugador</button>
        </form>
    </aside>

    <!-- Main -->
    <main class="sidebar__main">
        <div class="card-layout">
        @if(!is_null($players))
            @foreach ($players as $player)
            <div class="card-container">
            <a href="{{ route('players.show', $player->id) }}">
                <div class="card-layout__item">
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
    </main>
</div>



@endsection