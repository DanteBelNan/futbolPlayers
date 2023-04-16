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
                <div class="card-layout__item" style="background-image: url({{ asset(($player->avatar ?? 'avatars/default/defaultImage.png')) }})">
                    <h3>{{ $player->name }}</h3>
                    <p>{{ $player->description }}</p>
                    <a href="{{ route('players.show', $player->id) }}">View more</a>
                </div>
            @endforeach
        @else
            <p>No players found.</p>
        @endif
    </main>
</div>

@endsection