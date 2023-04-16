@extends('layouts.layouts')

@section('content')

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
            <div class="card-layout__item">
                <div class="card-layout__header">
                    <h3>{{ $player->name }}</h3>
                    <p>Position: {{ $player->posicion1 }}</p>
                    <p>Skill: {{ $player->skill }}</p>
                </div>
                <div class="card-layout__image" style="background-image: url({{ asset(($player->avatar ?? 'avatars/default/defaultImage.png')) }})">
                </div>
                <div class="card-layout__footer">
                    <a href="{{ route('players.show', $player->id) }}">View more</a>
                </div>
            </div>
            </div>
            
            @endforeach
        @else
            <p>No players found.</p>
        @endif
    </main>
</div>



@endsection